use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        return $user;
    }

    protected function loggedOut(Request $request)
    {
        $request->session()->regenerate();
        return resopnse()->json();
    }
}