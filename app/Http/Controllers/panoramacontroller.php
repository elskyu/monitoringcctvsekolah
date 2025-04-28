<?PHP

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panorama;

class Panoramacontroller extends Controller
{
    public function dashboard()
    {
        $panorama = panorama::all();
        return view('panorama.panorama', compact('panorama'));
    }
}

?>