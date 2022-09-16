<div class="col-md-3">
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            @switch(app()->getLocale())
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
        <li><a class="dropdown-item" href="{{ url('en') }}">English</a></li>
        <li><a class="dropdown-item" href="{{ url('ru') }}">Russian</a></li>
        <li><a class="dropdown-item" href="{{ url('uz') }}">Uzbek</a></li>
        <li><a class="dropdown-item" href="{{ url('qqr') }}">Karakalpak</a></li>
      </ul>
    </div>
</div>