use Illuminate\Http\Request;

class RegisterController extends Controlller
{
    protected function registered(Request $request, $user)
    {
        return $user;
    }
}