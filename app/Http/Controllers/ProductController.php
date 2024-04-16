<?php

namespace App\Http\Controllers;

use App\Mail\NewEventNotification;
// use App\Models\Category;
use App\Models\User;
use App\Models\Color;
use App\Models\Reference;
use App\Models\Product;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showForm()
    {
        $colors = Color::all();
        $references= Reference::all();
        $vehicules=Vehicule::all();
        
        return view('creator.createProduct',compact('colors','references','vehicules'));
    }
    
    // public function showDashboardcreator($id){
    //     $products = Product::with(['marque', 'modele', 'couleur', 'reference'])->find($id);
    //     return view('creator.dashboard',compact('products'));
    // }

    //my events
    public function AllEvents()
    {
        $user = Auth::user()->id;

        $products = Product::all()->where('creator', $user);

        return view('creator.allProducts', compact('products'));
    }

    public function CheckEvent()
    {
        $events = Event::where('status', 'En attente')->get();

        return view('admin.events', compact('events'));
    }

    public function ShowEventDescription($id)
    {
        $event = Event::find($id);
        return view('organiser.description', compact('event'));
    }

    public function EventContent($id)
    {
//        $event = Event::with('category')->find($id);
        $event = Event::find($id);
        $userRole = "organizer";

        return view('content', compact('event', 'userRole'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::id();

        $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'couleur' => 'required',
            'reference' => 'required',
            'annee' => 'required',
            'qtt_article' => 'required',
            'composants' => 'required',
            // 'image' => 'required|image',
            // 'category' => 'required',
        ]);

        // if ($request->hasFile('image')) {
        //     $fileName = time() . $request->file('image')->getClientOriginalName();
        //     $path = $request->file('image')->storeAs('image', $fileName, 'public');
        //     $picturePath = Storage::url($path);
        // } else {
        //     $picturePath = null;
        // }

        Product::create([
            'marque' => $request->marque,
            'modele' => $request->modele,
            'couleur' => $request->couleur,
            'reference' => $request->reference,
            'annee' => $request->annee,
            'qtt_article' => $request->qtt_article,
            'composants' => $request->composants,
            // 'image' => $picturePath,
            'creator' => $user,
            // 'category' => $request->category,
        ]);

        // $this->sendEmailToAdmin($user);

        return redirect('/dashboard');
    }


    private function sendEmailToAdmin()
    {
        $user = Auth::user()->name;

        $adminRole = Role::where('name', 'admin')->first();

        if ($adminRole) {
            $admins = $adminRole->users;

            foreach ($admins as $admin) {
                Mail::to($admin->email)->send(new NewEventNotification($user));
            }
        }
    }


    /**
     * Display the specified resource.
     */
    public function editEvent($id)
    {
        $content = file_get_contents('https://raw.githubusercontent.com/alaouy/sql-moroccan-cities/master/json/ville.json');
        $data = json_decode($content);

        $categories = Category::all();

        $event = Event::find($id);

        return view('organiser.updateEvent', compact('event', 'data', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateEvent(Request $request, $id)
    {
        $user = Auth::id();
        $event = Event::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'location' => 'required',
            'price' => 'required',
            'date' => 'required',
            'time' => 'required',
            'description' => 'required',
            'reservation_type' => 'required',
            'image' => 'required|image',
            'category' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('image', $fileName, 'public');
            $picturePath = Storage::url($path);
        } else {
            $picturePath = null;
        }

        $event->title = $request['title'];
        $event->location = $request['location'];
        $event->date = $request['date'];
        $event->time = $request['time'];
        $event->price = $request['price'];
        $event->nbr_place = $request['nbr_place'];
        $event->description = $request['description'];
        $event->reservation_type = $request['reservation_type'];
        $event->image = $picturePath;
        $event->creator = $user;
        $event->category = $request['category'];

        $event->save();
        return redirect('/allEvents');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteEvent(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect('/allEvents');
    }

    public function approveEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->status = 'Public';
        $event->save();

        return redirect()->back();
    }

    public function declineEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->status = 'Decline';
        $event->save();

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $LatestEvents = Event::limit(5)->where('status', 'Public')->get();

        $searchTerm = $request->input('search');

        $events = Event::where('status', 'Public')
            ->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('location', 'like', '%' . $searchTerm . '%');
            })
            ->paginate(6);

        return view('welcome', compact('events', 'categories', 'LatestEvents'));
    }


    public function filterByCategory($categoryName)
    {
        $categories = Category::all();
        $LatestEvents = Event::limit(5)->where('status', 'Public')->get();

        $category = Category::where('name', $categoryName)->firstOrFail();

        $events = Event::where('category', $category->id)
            ->where('status', 'Public')->paginate(6);

        //dd($events);
        return view('welcome', compact('events', 'categories', 'LatestEvents'));
}

    
}
