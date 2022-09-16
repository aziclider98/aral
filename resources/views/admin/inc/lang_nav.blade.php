<div class="dropdown col-md-2">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          @switch($locale)
              @case('en')
                  English
                  @break
              @case('ru')
                  Russian
                  @break
              @case('uz')
                  Uzbek
                  @break
              @case('qqr')
                  Karakalpak
                  @break

          @endswitch

    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      <li><a class="dropdown-item" href="{{ url('en/admin/post') }}">English</a></li>
      <li><a class="dropdown-item" href="{{ url('ru/admin/post') }}">Russian</a></li>
      <li><a class="dropdown-item" href="{{ url('uz/admin/post') }}">Uzbek</a></li>
      <li><a class="dropdown-item" href="{{ url('qqr/admin/post') }}">Karakalpak</a></li>
    </ul>
</div>