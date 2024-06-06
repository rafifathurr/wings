@php
    use Illuminate\Support\Facades\Auth;
@endphp
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a href="{{ route('checkout.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-cart-plus"></i>
                        <p>Check Out</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('report.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-th-list"></i>
                        <p>Report</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
