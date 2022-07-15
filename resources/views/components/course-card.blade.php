<div class="card" style="width: 18rem; border-radius: 10px 40px;">
    <div class="card-body" style="background-color: #408DA6; border-radius: 10px 40px;" >
      <div class="card-title">
        <div style="background: rgba(236, 236, 236, 0.7);" class="rounded-5 rounded w-25 text-center text-black">
            <h6 style=" color: #787878;">
            @yield('course-info')
            </h6>
        </div>
      </div>
      <div class="card-subtitle d-flex align-items-center justify-content-center">
        <img src="@yield('img')" class="rounded-circle" alt="Gambar" style="width:100px;">
      </div>
      <h4 class="text-white text-center">
        @yield('title')
      </h4>
      <p class="text-white text-center">
        @yield('desc')
        </p>
    </div>
</div>
