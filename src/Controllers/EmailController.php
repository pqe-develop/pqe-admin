<?php

namespace Pqe\Admin\Controllers;

use Illuminate\Http\Request;
use Pqe\Admin\Models\Email;

class EmailController extends Controller {

    public function getAllEmails() {
        $emails = Email::get()->toJson(JSON_PRETTY_PRINT);
        return response($emails, 200);
    }

    public function getEmail($id) {
        if (Email::where('id', $id)->exists()) {
            $email = Email::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($email, 200);
        } else {
            return response()->json([
                "message" => "Email not found"
            ], 404);
        }
    }

    public function createEmail(Request $request) {
        if ($request->user()->tokenCan('create')) {
            $email = new Email();
            $email->subject = $request->subject;
            $email->body = $request->body;
            $email->status = $request->status;
            $email->source = $request->source;
            $email->from = $request->from;
            $email->to = is_null($request->to) ? 1 : $request->to;
            $email->cc = is_null($request->cc) ? 1 : $request->cc;
            $email->bcc = is_null($request->bcc) ? 1 : $request->bcc;
            $email->save();
            return response()->json([
                "message" => "Email record created successfully",
                "email id" => $email->id
            ], 201);
        } else {
            response()->json([
                "message" => "User not have permision to store email",
                "status" => false
            ], 403);
        }
    }

    public function updateEmail(Request $request, $id) {
        if (Email::where('id', $id)->exists()) {
            $email = Email::find($id);

            $email->subject = is_null($request->subject) ? $email->subject : $email->subject;
            $email->status = is_null($request->status) ? $email->status : $email->status;
            $email->source = $request->source;
            $email->from = $request->from;
            $email->to = is_null($request->to) ? 1 : $request->to;
            $email->cc = is_null($request->cc) ? 1 : $request->cc;
            $email->bcc = is_null($request->bcc) ? 1 : $request->bcc;
            $email->save();

            return response()->json([
                "message" => "records updated successfully."
            ], 200);
        } else {
            return response()->json([
                "message" => "Email not found."
            ], 404);
        }
    }

    public function deleteEmail($id) {
        if (Email::where('id', $id)->exists()) {
            $email = Email::find($id);
            $email->delete();

            return response()->json([
                "message" => "records deleted successfully."
            ], 202);
        } else {
            return response()->json([
                "message" => "Email not found."
            ], 404);
        }
    }
}
