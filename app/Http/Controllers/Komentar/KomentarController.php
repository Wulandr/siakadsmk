<?php

namespace App\Http\Controllers\Komentar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Komentar;
use App\Models\Berita;
use App\Models\Kegiatan;
use App\Models\Produk;
use App\Models\Dokumen;
use App\Models\Mitra;
use App\Models\RoleAssignment;
use App\Models\User as Usernya;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\Mitra as ModelsMitra;
use Illuminate\Support\Facades\File;

class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $rolenm = DB::table('roles')->where('id', Auth()->user()->role)->first();
        $assignrole = $rolenm->name;
        $user = Usernya::all()->where('id', Auth()->user()->id)->first()->syncRoles($assignrole);
        $users = DB::table('users')->get();
        $role = DB::table('roles')->get();
        $tabelRole =  Role::all();
        $roleAssignment = RoleAssignment::all();

        $id = base64_decode($id);
        $komentar = new Komentar();
        $berita = new Berita();
        $berita = Berita::where('id', $id)->first();
        $comments = $komentar->all()->where('id_berita', $id);
        $mitra = Mitra::all();
        return view('dashboard/berita/komentar_berita', compact(
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'comments',
            'berita',
            'id',
            'mitra'
        ));
    }

    public function index_kegiatan($id)
    {
        $rolenm = DB::table('roles')->where('id', Auth()->user()->role)->first();
        $assignrole = $rolenm->name;
        $user = Usernya::all()->where('id', Auth()->user()->id)->first()->syncRoles($assignrole);
        $users = DB::table('users')->get();
        $role = DB::table('roles')->get();
        $tabelRole =  Role::all();
        $roleAssignment = RoleAssignment::all();
        $mitra = Mitra::all();

        $id = base64_decode($id);
        $komentar = new Komentar();
        $kegiatan = new Kegiatan();
        $kegiatan = Kegiatan::where('id', $id)->first();
        $comments = $komentar->all()->where('id_kegiatan', $id);
        return view('dashboard/kegiatan/komentar_kegiatan', compact(
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'mitra',
            'comments',
            'kegiatan',
            'id'
        ));
    }

    // index produk
    public function index_produk($id)
    {
        $rolenm = DB::table('roles')->where('id', Auth()->user()->role)->first();
        $assignrole = $rolenm->name;
        $user = Usernya::all()->where('id', Auth()->user()->id)->first()->syncRoles($assignrole);
        $users = DB::table('users')->get();
        $role = DB::table('roles')->get();
        $tabelRole =  Role::all();
        $roleAssignment = RoleAssignment::all();
        $mitra = Mitra::all();

        $id = base64_decode($id);
        $komentar = new Komentar();
        $produk = new Produk();
        $produk = Produk::where('id', $id)->first();
        $comments = $komentar->all()->where('id_produk', $id);
        return view('dashboard/produk/komentar_produk', compact(
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'mitra',
            'comments',
            'produk',
            'id'
        ));
    }

    public function store(Request $request)
    {
        $comment = new Komentar();
        $comment->id_user = $request->id_user;
        $comment->komentar = $request->komentar;
        $comment->id_berita = $request->id_berita;
        $comment->save();
        return back();
    }
    public function store_kegiatan(Request $request)
    {
        $comment = new Komentar();
        $comment->id_user = $request->id_user;
        $comment->komentar = $request->komentar;
        $comment->id_kegiatan = $request->id_kegiatan;
        $comment->save();
        return back();
    }
    public function store_produk(Request $request)
    {
        $comment = new Komentar();
        $comment->id_user = $request->id_user;
        $comment->komentar = $request->komentar;
        $comment->id_produk = $request->id_produk;
        $comment->save();
        return back();
    }


    public function replyStore(Request $request)
    {
        $reply = new Komentar();
        $reply->id_user = $request->get('id_user');
        $reply->komentar = $request->get('komentar');
        $reply->id_berita = $request->get('id_berita');
        $reply->id_parent = $request->get('id_parent');
        $reply->save();
        return back();
    }
    public function replyStore_kegiatan(Request $request)
    {
        $reply = new Komentar();
        $reply->id_user = $request->get('id_user');
        $reply->komentar = $request->get('komentar');
        $reply->id_kegiatan = $request->get('id_kegiatan');
        $reply->id_parent = $request->get('id_parent');
        $reply->save();
        return back();
    }
    public function replyStore_produk(Request $request)
    {
        $reply = new Komentar();
        $reply->id_user = $request->get('id_user');
        $reply->komentar = $request->get('komentar');
        $reply->id_produk = $request->get('id_produk');
        $reply->id_parent = $request->get('id_parent');
        $reply->save();
        return back();
    }
    public function isAktif(Request $request)
    {
        $kom = Komentar::find($request->id);
        $kom->is_aktif = $request->is_aktif;
        $kom->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
}
