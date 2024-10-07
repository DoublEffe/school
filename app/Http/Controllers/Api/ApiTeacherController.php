<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//Teacher api section
class ApiTeacherController extends Controller
{
  //send to the frontned the classes for the teacher logged
  public function class(Request $request): JsonResponse {
    $class= DB::table('classes')->where('id_teacher', Auth::user()->id)->get();
    return response()->json(['classes'=> $class]);
  }

  //send from the db the student answer of exercises to the frontend
  public function student_answer(Request $request): JsonResponse {
    $classes= DB::table('classes')->where('id', $request['id'])->get();
    $student_answers = [];
    $student_answer =  [];
    $answers= DB::table('answer')->where('id_students', $classes[0]->id_student)->get();
    for ($i = 0; $i < count($answers); $i++) {
      $exercise = DB::table('exercise')->where('id', $answers[$i]->exercise_id)->first();
      $student_answer['id'] = $answers[$i]->id;
      isset($exercise->questions) ? $student_answer['question'] = $exercise->questions : $student_answer['question'] = $exercise->images;
      $student_answer['answer'] = $answers[$i]->answer;
      $obj = json_decode(json_encode($student_answer), FALSE);
      array_push($student_answers, $obj);
    }
    return response()->json(['student_answer'=> $student_answers]);
  }

  //store the evaluation of each exercise
  public function evaluation(Request $request) {
    DB::table('answer')->where('id', $request['id'])->update(['evaluation' => $request['evaluation']]);
    return response()->json(['success' => 'success'], 200);
  }

  //retrieve from the db the exercise for each subject and send them to frontend
  public function archive(Request $request): JsonResponse {
    $archives = DB::table('archive')->get();
    $classes = DB::table('classes')->get();
    $classes_name = [];
    foreach( $classes as $class){
      array_push($classes_name, $class->name);
    }
    $subs = [];
    $questions = [];
    $k = 0;
    $obj = [];
    for($i=0; $i <= count($archives)-1; $i++){
      array_push($subs, $archives[$i]->subjects);
      if(isset($archives[$i+1]) && $archives[$i]->subjects == $archives[$i+1]->subjects ){
        if(isset($archives[$i]->questions)){
          array_push($questions, $archives[$i]->questions);
        }
        else {
          array_push($questions, $archives[$i]->images);
        }
        $k = $i;
      }
      else {
        if(isset($archives[$i]->questions)){
          array_push($questions, $archives[$i]->questions);
        }
        else {
          array_push($questions, $archives[$i]->images);
        }
        $obj[$archives[$i]->subjects] = $questions;
        $questions = [];
        $k++;
      }
    }
    $subs = array_values(array_unique($subs));
    return response()->json(['archive' => $obj, 'subs' => $subs, 'classes' => $classes_name]);
  }

  //assign the exercise to class
  public function assign(Request $request) {
    $class = DB::table('classes')->where('name', $request['class'])->first();
    $sub = DB::table('subjects')->where('name', $request['subject'])->where('id_class', $class->id)->first();
    if(!str_starts_with($request['questions'],'data:image/jpeg;base64')){
      $insertExercise = DB::table('exercise')->insert(['questions' => $request['questions'], 'subjects_id' => $sub->id]);
      $ex = DB::table('exercise')->where('questions', $request['questions'])->first();
      $id = DB::table('subjects')->where('id', $sub->id)->update(['id_exercise' => $ex->id]);
    }
    else{
      $insertExercise = DB::table('exercise')->insert(['images' => $request['questions'], 'subjects_id' => $sub->id]);
      $ex = DB::table('exercise')->where('questions', $request['questions'])->first();
      $id = DB::table('subjects')->where('id', $sub->id)->update(['id_exercise' => $ex->id]);
    }
    return response()->json(['success' => 'success'], 200);
  }

  //retrieve statistics from db and and send them to frontend
  public function retriveStats(Request $request): JsonResponse {
    $stats = Db::table('stats')->get();
    return response()->json($stats);
  }
}
