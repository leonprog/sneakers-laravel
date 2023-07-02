<div class="shop__sidebar__categories">
    <ul class="nice-scroll">
        @foreach($filter->value as $value)
            <li>
                <div class="form-check">
                    <input class="form-check-input"
                           name="filters[{{ $filter->field }}_{{ $filter->param }}][{{ $value['id'] }}]"
                           type="checkbox"
                           value="{{ $value['id'] }}"
                           id="{{ $filter->field }}_{{ $value['id'] }}"

                        @if(isset(request()->get('filters')[$filter->field. "_". $filter->param]))
                            {{  (in_array($value['id'], request()->get('filters')[$filter->field. "_". $filter->param])) ? 'checked' : '' }}
                        @endif
                    >
                    <label class="form-check-label link-style" for="{{ $filter->field }}_{{ $value['id'] }}">
                        {{ $value['title'] }} ({{  $value['products_count'] }})
                    </label>
                </div>
            </li>
        @endforeach
    </ul>
</div>
