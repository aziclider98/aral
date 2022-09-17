<div class="dropdown col-md-2">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          @switch($locale)
              @case('en')
                  @lang('auth.english')
                  @break
              @case('ru')
                  @lang('auth.russian')

                  @break
              @case('uz')
                  @lang('auth.uzbek')
                  @break
              @case('qqr')
                  @lang('auth.karakalpak')
                  @break
          @endswitch
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      @switch($locale)
          @case('en')
            <li><a class="dropdown-item" href="{{ url('ru') }}">@lang('auth.russian')</a></li>
            <li><a class="dropdown-item" href="{{ url('uz') }}">@lang('auth.uzbek')</a></li>
            <li><a class="dropdown-item" href="{{ url('qqr') }}">@lang('auth.karakalpak')</a></li>
            @break
          @case('ru')
            <li><a class="dropdown-item" href="{{ url('en') }}">@lang('auth.english')</a></li>
            <li><a class="dropdown-item" href="{{ url('uz') }}">@lang('auth.uzbek')</a></li>
            <li><a class="dropdown-item" href="{{ url('qqr') }}">@lang('auth.karakalpak')</a></li>
            @break
          @case('uz')
            <li><a class="dropdown-item" href="{{ url('en') }}">@lang('auth.english')</a></li>
            <li><a class="dropdown-item" href="{{ url('ru') }}">@lang('auth.russian')</a></li>
            <li><a class="dropdown-item" href="{{ url('qqr') }}">@lang('auth.karakalpak')</a></li>
            @break
          @case('qqr')
            <li><a class="dropdown-item" href="{{ url('en') }}">@lang('auth.english')</a></li>
            <li><a class="dropdown-item" href="{{ url('ru') }}">@lang('auth.russian')</a></li>
            <li><a class="dropdown-item" href="{{ url('uz') }}">@lang('auth.uzbek')</a></li>
            @break
          @default
            <li><a class="dropdown-item" href="{{ url('en') }}">@lang('auth.english')</a></li>
      @endswitch
    </ul>
</div>