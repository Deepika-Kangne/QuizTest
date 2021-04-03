<?php

namespace App\Http\Controllers\Quiz;

use GuzzleHttp;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Scoreboard;
use App\User;

class QuizController extends Controller
{
    public function indexScore(Request $request)
    {
        if (isset($_GET['Status'])) {
            session_start();
            $istest = $_SESSION["test"];
            if ($istest == 'Done' && isset($_COOKIE['score']) && isset($_COOKIE['listofanswers'])) {

                $score = $_COOKIE['score'];
                $list = $_COOKIE['listofanswers'];
                $newscore = new Scoreboard();
                $newscore->user_id = Auth::user()->id;
                $newscore->score = $_COOKIE['score'];
                $newscore->attempt = ($istest == 'Done') ? 'yes' : 'no';
                $newscore->answer_sheet = $_COOKIE['listofanswers'];
                $newscore->attempt_at = date('y-m-d h:m:s');
                $newscore->save();
                Session::flash('success', 'Score Recoreded');
                return redirect()->to('dashboard');
            }
            // print_r($_GET['list']);
        } else {
            $scoreData = Scoreboard::select('id', 'user_id', 'attempt')->where('user_id', Auth::user()->id)->get();
            $AllscoreData = Scoreboard::select('id', 'user_id', 'attempt')->get();
            $AllUserData = User::select('*')->get();
            return  view('admin.dashboard', ['scoreData' => $scoreData, 'allscoredata' => $AllscoreData, 'AllUserData' => $AllUserData]);
        }
    }

    public function getQuiz()
    {
        if (Auth::check()) {
            // $scoreData = Scoreboard::where('user_id', Auth::user()->id);
            $scoreData = Scoreboard::select('id', 'user_id', 'attempt')->where('user_id', Auth::user()->id)->get();

            if ($scoreData[0]->attempt == 'no') {
                $amount = 5;
                $client = new GuzzleHttp\Client(['base_uri' => 'https://opentdb.com']);
                $response = $client->request('GET', '/api.php?amount=' . $amount . '');
                if ($response->getStatusCode() == 200) {
                    $QuesData = $response->getBody()->getContents();
                    return  view('mcq.mcqstart')->with('QuestionsArr', json_decode($QuesData)->results);
                } else {
                    Session::flash('error', 'Questions fetch failed plz try after some time');
                    print_r(Session::get('error'));
                    return redirect()->to('dashboard');
                }
            } else {
                Session::flash('error', 'Quiz Attempt is Done');
                return redirect()->to('dashboard');
            }
        } else {
            Session::flash('error', 'Please Login to attempt for Test');
            return redirect('/');
        }
    }


    public function getScoreBoard()
    {
        $scoreAll = Scoreboard::select('*')
            ->join('users', 'users.id', '=', 'scoreboard.user_id')
            ->get();
        return view('mcq.scoreboard', ['Scoreboard' => $scoreAll]);
    }
}
