<nav class="cell grid-x grid-margin-x grid-padding-y">
    <a class="cell shrink" href="{{ route('home') }}">
        Wishes 
    </a>

    @can('create', 'App\Wish')
        <a class="cell shrink" href="{{ route('wish.create') }}">
            I Want Help Finding Something
        </a>

        <a class="cell shrink" href="{{ route('wish.index', ['user' => Auth::id()]) }}">
            My Wishes
        </a>

        <a class="cell shrink" href="{{ route('wish.fulfillment.index', ['user' => Auth::id()]) }}">
            Wishes I'm Trying to Fulfill
        </a>
    @else
        <a class="cell shrink" href="{{ route('login') }}">
            I Want Help Finding Something
        </a>
    @endcan

    <!-- Authentication Links -->
    @guest
        <a class="nav-link cell shrink" href="{{ route('login') }}">{{ __('Login') }}</a>
    @else
        <a class="dropdown-item cell shrink" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endguest
</nav>


<section class="hide">

<form action="">
    <select>
        <option>
            Need Stuff
        </option>
        <option>
            Want to Donate Stuff
        </option>
    </select>

    <input type="text" />
</form>

</section>