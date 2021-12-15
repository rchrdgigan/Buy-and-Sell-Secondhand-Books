<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Category;
use App\Models\Shop;
use App\Models\ReportInfo;
use App\Models\AssignReportedUser;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserRegistration;

use Illuminate\Http\Request;

class AccountManagementController extends Controller
{
    public function showUsers()
    {
        $user_data = User::latest()->get();

        return view('admin.user-management',compact('user_data'));
    }
    
    public function updateStatus($user_id ,$status_code)
    {
        try {
            $update_user = User::whereId($user_id)->update([
                'status' => $status_code,
            ]);
            if($update_user){
                $user = User::where("id",$user_id)->first();
                $registrationData = [
                    'body' => 'You recieve an new message notification!',
                    'registrationText' => 'Thank you for registering your account at our website, Admin has alredy approve your registration.',
                    'url' => url('/login'),
                    'thankyou' => 'Thanks for your kindly waiting!'
                ];
                // $user->notify(new UserRegistration($registrationData));
                Notification::send($user, new UserRegistration($registrationData));
                return redirect()->route('admin.users')->with('success_message', 'Update status successfully!');
            }
            return redirect()->route('admin.users')->with('error_message', 'Updated status unsuccessfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();

            if($user)
            {
                return redirect()->route('admin.users')->with('success_message', 'Successfully deleted!');
            }
            return redirect()->route('admin.users')->with('error_message', 'Unsuccessfully deleted!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function reportedBy(Request $request, $user_id)
    {
        $category = Category::with('assign_book_category')->get();
        $shop = Shop::with('shop_book')->get();
        if(auth()->user()->id == $user_id)
        {
            return "Youre not allowed to report your own account!";
        }
        else {
            try {
                $existing_user = AssignReportedUser::where('reported_by_id', auth()->user()->id)->where('user_id', $user_id)->first();
                if($existing_user)
                {
                    return view('seller-already-reported', compact('category','shop'));
                }
                //create reported user
                if($request->hasFile('prof'))
                {
                    $filenameWithExt = $request->file('prof')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('prof')->getClientOriginalExtension();
                    $fileNameToStore = $filename.'_'.time().'.'.$extension;
                    $path = $request->file('prof')->move('public/report_prof/',$fileNameToStore);
                }
                else
                {
                    $fileNameToStore = 'noimage.png';
                }

                $report = ReportInfo::create([
                    'reason' => $request->reason,
                    'upload_prof' => $fileNameToStore,
                ]);
    
                AssignReportedUser::create([
                    'report_info_id'=>$report->id,
                    'user_id' => $user_id,
                    'reported_by_id' => auth()->user()->id,
                ]);
                if($report){
                    return view('seller-reported-succeeded', compact('category','shop'));
                }

            } catch (\Throwable $th) {
                throw $th;
                
            }
        }
    }

    public function listReported()
    {
        $report = AssignReportedUser::get();
        $report->map(function($item){
            $reported_info = ReportInfo::findOrFail($item->report_info_id);
            $item->reason = $reported_info->reason;
            $item->valid_prof = $reported_info->upload_prof;
            $customer_info = User::findOrFail($item->user_id);
            $item->user_image = $customer_info->image;
            $item->first_name = $customer_info->first_name;
            $item->middle_name = $customer_info->middle_name;
            $item->last_name = $customer_info->last_name;
            $item->gender = $customer_info->gender;
            $item->brgy = $customer_info->brgy;
            $item->street = $customer_info->street;
            $item->purok = $customer_info->purok;
            $item->email = $customer_info->email;
        });
        return view('admin.reported',compact('report'));

    }

    //admin block user
    public function blockStatus($user_id ,$status_code)
    {
        try {
            $update_user = User::whereId($user_id)->update([
                'status' => $status_code,
            ]);
            $mytime = Carbon::now();
            AssignReportedUser::where('user_id', $user_id)->update([
                'date_of_blocked' => $mytime->toDateTimeString(),
                'status' => 'blocked',
            ]);
            
            if($update_user){
                return redirect()->route('admin.blocked')->with('success_message', 'Update status successfully!');
            }
            return redirect()->route('admin.blocked')->with('error_message', 'Updated status unsuccessfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function listBlocked()
    {
        $report = AssignReportedUser::get();
        $report->map(function($item){
            $reported_info = ReportInfo::findOrFail($item->report_info_id);
            $item->reason = $reported_info->reason;
            $item->valid_prof = $reported_info->upload_prof;
            $customer_info = User::findOrFail($item->user_id);
            $item->user_image = $customer_info->image;
            $item->first_name = $customer_info->first_name;
            $item->middle_name = $customer_info->middle_name;
            $item->last_name = $customer_info->last_name;
            $item->gender = $customer_info->gender;
            $item->brgy = $customer_info->brgy;
            $item->street = $customer_info->street;
            $item->purok = $customer_info->purok;
            $item->email = $customer_info->email;
        });
        return view('admin.blocked',compact('report'));
    }

    //admin unblock user
    public function unblockStatus($user_id ,$status_code)
    {
        try {
            $update_user = User::whereId($user_id)->update([
                'status' => $status_code,
            ]);
            if($update_user){
                $mytime = Carbon::now();
                AssignReportedUser::where('user_id', $user_id)->update([
                    'date_of_unblocked' => $mytime->toDateTimeString(),
                    'status' => 'draft',
                ]);
                return redirect()->route('admin.history')->with('success_message', 'Update status successfully!');
            }
            return redirect()->route('admin.history')->with('error_message', 'Updated status unsuccessfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function listHistory()
    {
        $report = AssignReportedUser::get();
        $report->map(function($item){
            $reported_info = ReportInfo::findOrFail($item->report_info_id);
            $item->reason = $reported_info->reason;
            $item->valid_prof = $reported_info->upload_prof;
            $customer_info = User::findOrFail($item->user_id);
            $item->user_image = $customer_info->image;
            $item->first_name = $customer_info->first_name;
            $item->middle_name = $customer_info->middle_name;
            $item->last_name = $customer_info->last_name;
            $item->gender = $customer_info->gender;
            $item->brgy = $customer_info->brgy;
            $item->street = $customer_info->street;
            $item->purok = $customer_info->purok;
            $item->email = $customer_info->email;
        });
        return view('admin.history',compact('report'));
    }

    public function delReport($id)
    {
        $report = ReportInfo::find($id);
        $report->delete();

        if($report)
        {
            return redirect()->route('admin.history')->with('message','Deleted Successfully!');
        }
    }

    public function main()
    {
        $reported = AssignReportedUser::where('status', 'log')->get();
        $user = User::get();
        $blocked = AssignReportedUser::where('status', 'blocked')->get();
        $count_r_user = $reported->count();
        $count_user = $user->count();
        $blocked_user = $blocked->count();
        return view('admin.main', compact('count_r_user','count_user','blocked_user','reported'));
    }

    public function userReported($id)
    {

        $report = AssignReportedUser::where('report_info_id',$id)->get();
        $report->map(function($item){
            $reported_info = ReportInfo::findOrFail($item->report_info_id);
            $item->reason = $reported_info->reason;
            $item->valid_prof = $reported_info->upload_prof;
            $user1_info = User::findOrFail($item->user_id);
            $item->user_image = $user1_info->image;
            $item->first_name = $user1_info->first_name;
            $item->middle_name = $user1_info->middle_name;
            $item->last_name = $user1_info->last_name;
            $item->gender = $user1_info->gender;
            $item->contact = $user1_info->contact;
            $item->brgy = $user1_info->brgy;
            $item->street = $user1_info->street;
            $item->purok = $user1_info->purok;
            $item->email = $user1_info->email;
            $item->user_status = $user1_info->status;
            $user2_info = User::findOrFail($item->reported_by_id);
            $item->user2_image = $user2_info->image;
            $item->first2_name = $user2_info->first_name;
            $item->middle2_name = $user2_info->middle_name;
            $item->last2_name = $user2_info->last_name;
            $item->gender2 = $user2_info->gender;
            $item->contact2 = $user2_info->contact;
            $item->brgy2 = $user2_info->brgy;
            $item->street2 = $user2_info->street;
            $item->purok2 = $user2_info->purok;
            $item->email2 = $user2_info->email;
            $item->user2_status = $user2_info->status;

        });
        return view('admin.view-reported-user',compact('report'));
    }

    public function searchUser(Request $request)
    {
        $search = $request->get('srch');
        $user_data = User::where("status","like","%".$search."%")
            ->orWhere("first_name","like","%".$search."%")
            ->orWhere("middle_name","like","%".$search."%")
            ->orWhere("last_name","like","%".$search."%")->paginate(9);
        return view('admin.user-management',compact('user_data'));
    }
}
