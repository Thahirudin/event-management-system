<div class="d-inline-block w-100 text-center p-3">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <a class="bg-primary iq-sign-btn" href="#"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();" role="button">
        Keluar <i class="ri-login-box-line ml-2"></i>
    </a>
</div>
@foreach ($orders as $order)
    {{ $order->id }}
@endforeach