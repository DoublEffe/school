<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


//Student api section
class ApiStudentController extends Controller
{
  //send to ftontend the subjects for the student logged
  public function subjects(Request $request): JsonResponse {
      $class = DB::table('classes')->where('id_student', Auth::user()->id)->first();
      $subs = DB::table('subjects')->where('id_class', $class->id)->get();
      return response()->json(['subs'=>$subs]);
  }

  //send to frontend the exercise for the selected subject
  public function exercise(Request $request): JsonResponse {
      //$exs = Subjects::find($request['id'])->exercise()->get();
      $exs = DB::table('exercise')->where('id', $request['id'])->get();
      $evals = [];
      foreach($exs as $ex) {
        $eval = DB::table('answer')->where('exercise_id', $ex->id)->first();
        array_push($evals, $eval);
      }
      return response()->json(['exercise' => $exs, 'evaluations' => $evals]);
    }

  //storing in db the answer for the exercise from the frontend
  public function answer(Request $request) {
      DB::table('answer')->updateOrInsert(['answer' => $request['answer'], 'id_students' => Auth::user()->id, 'exercise_id' => $request['id']]);
      return response()->json(['success' => 'success'], 200);
  }

  //store the chat with Ai of the student logged
  public function chats(Request $request) {
      DB::table('chats')->insert(['questions' => $request['message'], 'id_students' => Auth::user()->id]);
      return response()->json(['success' => 'success'], 200);
  }

  //insert in the db the statistics
  public function stats(Request $request) {
      $actual_number = DB::table('stats')->where('name', $request['name'])->first();
      if(empty($actual_number)) {
        $stats = DB::table('stats')->insert(['name' => $request['name'], 'number' => 1]);
      }
      else {
        $stats = DB::table('stats')->update(['number' => $actual_number->number + 1]);
      }
      return response()->json(['success' => 'success'], 200);
  }

}
