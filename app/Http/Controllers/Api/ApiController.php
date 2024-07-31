<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ApiRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Models\Subjects;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;



class ApiController extends Controller {
  public function subjects(Request $request): JsonResponse
    {
        //$user = $request->getSubjects();
        //$user = $request->session()->all();
        $class = DB::table('class')->where('id_student', $request['id'])->first();
        $subs = DB::table('subjects')->where('id_class', $class->id)->get();
        

        Log::debug($subs);
        
      
        return response()->json(['subs'=>$subs]);
    }
  public function exercise(Request $request): JsonResponse
    {
        //$user = $request->getSubjects();
        //$user = $request->session()->all();
        //$subs = DB::table('subjects')->where('id_exercise', $request['id'])->first();
        //$ex = DB::table('exercise')->where('id', $subs->id)->get();
        $exs = Subjects::find(1)->exercise()->get();
        $questions = [];
        $images = [];
        $evals = [];
        foreach($exs as $ex) {
          //array_push($questions, $ex['questions']);
          //array_push($images, $ex['images']);
          $eval = DB::table('answer')->where('exercise_id', $ex->id)->first();
          array_push($evals, $eval);
        }
        Log::info($exs);
        Log::info(json_encode($evals));
        
      
        return response()->json(['exercise' => $exs, 'evaluations' => $evals]);
    }

    public function answer(Request $request): JsonResponse {
      Log::info($request);
      $ex = DB::table('answer')->updateOrInsert(['answer' => $request['answer'], 'id_students' => 3, 'exercise_id' => 1]);
      Log::info($ex);
      return response()->json(['test'=>'test']);
    }
    public function class(Request $request): JsonResponse {
      Log::info($request);
      $class= DB::table('class')->where('id_teacher', $request['id'])->get();
      Log::info($class);
      return response()->json(['classes'=> $class]);
    }
    public function student_answer(Request $request): JsonResponse {
      $classes= DB::table('class')->where('id', $request['id'])->get();
      Log::info($classes[0]->name);
      $student_answers = [];
      $student_answer =  [];
      $answers= DB::table('answer')->where('id_students', $classes[0]->id_student)->get();
      $exercise = DB::table('exercise')->where('id', $answers[0]->exercise_id)->get();
      $student_answer['id'] = $answers[0]->id;
      $student_answer['question'] = $exercise[0]->questions;
      $student_answer['answer'] = $answers[0]->answer;
      $obj = json_decode(json_encode($student_answer), FALSE);
      Log::info(json_encode($obj));
      return response()->json(['student_answer'=> [$obj]]);
    }

    public function evaluation(Request $request): JsonResponse {
      $answers= DB::table('answer')->where('id', $request['id'])->update(['evaluation' => $request['evaluation']]);

      return response()->json(['test'=> 'test']);
    }

    public function archive(Request $request): JsonResponse {
      $archives = DB::table('archive')->get();
      $classes = DB::table('class')->get();
      $classes_name = [];
      foreach( $classes as $class){
        array_push($classes_name, $class->name);
      }
      $subs = [];
      $questions = [];
      $k = 0;
      $obj = [];
      for($i=0; $i <= count($archives)-1; $i++){
        //if($i+1 == count($archives)) {break;}
        array_push($subs, $archives[$i]->subjects);
        
        
        if(isset($archives[$i+1]) && $archives[$i]->subjects == $archives[$i+1]->subjects ){
          array_push($questions, $archives[$i]->questions);
          $k = $i;
        }
        else {
          array_push($questions, $archives[$i]->questions);
          $obj[$archives[$i]->subjects] = $questions;
          $questions = [];
          $k++;
        }
      }
      $subs = array_values(array_unique($subs));

      return response()->json(['archive' => $obj, 'subs' => $subs, 'classes' => $classes_name]);
    }

    public function assign(Request $request): JsonResponse {
      $sub = DB::table('subjects')->where('name', $request['subject'])->first();
      $insertExercise = DB::table('exercise')->insert(['questions' => $request['questions'], 'subjects_id' => $sub->id]);
      return response()->json(['test' => 'test']);
    }

    public function test(Request $request) {
      if ($request->has('type') && $request->input('type') === 'insegnante') {
        Config::set('session.table', 'sessions_teacher');
        
      } else if($request->has('type') && $request->input('type') === 'studente'){
        Config::set('session.table', 'sessions_student');
        
      }
      Log::info(Config::get('session.table'));
      return response()->noContent();
    }
}