
<div class="row mb-4">
    <div class="col-md-8">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">

            <label class="btn btn-secondary label-btn {{ (old('interval') == 'today') ? 'active' : ''  }}" onclick="setDate(this)" data-from="{{ date('Y-m-d')}}" data-to="{{ date('Y-m-d') }}">
                <input type="radio" name="interval" value="today"  autocomplete="off"  {{ (old('interval') == 'today') ? 'checked' : ''  }}> Bugun
            </label>

            <label class="btn btn-secondary label-btn {{ (old('interval') == 'yesterday') ? 'active' : ''  }}" onclick="setDate(this)"  data-from="{{ date('Y-m-d', strtotime('yesterday')) }}" data-to="{{ date('Y-m-d', strtotime('yesterday')) }}">
                <input type="radio" name="interval"  value="yesterday" autocomplete="off" {{ (old('interval') == 'yesterday') ? 'checked' : ''  }}> Kecha
            </label>

            <label class="btn btn-secondary label-btn {{ (old('interval') == 'week') ? 'active' : ''  }}" onclick="setDate(this)" data-from="{{ date('Y-m-d', strtotime('-1 week')) }}"
                    data-to="{{ date('Y-m-d', strtotime('yesterday')) }}">
                <input type="radio" name="interval"  value="week" autocomplete="off" {{ (old('interval') == 'week') ? 'checked' : ''  }}> Oxirgi 7 kun
            </label>

            <label class="btn btn-secondary label-btn {{ (old('interval') == '-30 days') ? 'active' : ''  }} {{ (old('interval') == '' ? 'active' : '' )  }}" onclick="setDate(this)" data-from="{{ date('Y-m-d', strtotime('-30 days')) }}"
                    data-to="{{ date('Y-m-d', strtotime('yesterday')) }}">
                <input type="radio" name="interval"  value="-30 days" autocomplete="off" {{ (old('interval') == '-30 days') ? 'checked' : ''  }}> Oxirgi 30 kun
            </label>

             <label class="btn btn-secondary label-btn {{ (old('interval') == 'month') ? 'active' : ''  }}" onclick="setDate(this)" data-from="{{ date('Y-m-d', strtotime('first day of this month')) }}"
                    data-to="{{ date('Y-m-d', strtotime('last day of this month')) }}">
                <input type="radio" name="interval"  value="month" autocomplete="off" {{ (old('interval') == 'month') ? 'checked' : ''  }}> Shu oy
            </label>

            <label class="btn btn-secondary label-btn {{ (old('interval') == 'lastMonth') ? 'active' : ''  }}" onclick="setDate(this)" data-from="{{ date('Y-m-d' , strtotime('first day of last month')) }}"
                 data-to="{{ date('Y-m-d' , strtotime('last day of last month')) }}">
                <input type="radio" name="interval"  value="lastMonth" autocomplete="off" {{ (old('interval') == 'lastMonth') ? 'checked' : ''  }}> O'tgan oy
            </label>

        </div>
    </div>
    <div class="col-md-2">
        <input id="from" name="from" class="form-control" type="date" value="{{ old('from') ?? date('Y-m-d', strtotime('-30 days')) }}" required>
    </div>
    <div class="col-md-2">
        <input id="to" name="to" class="form-control" type="date" value="{{ old('to') ?? date('Y-m-d', strtotime('yesterday')) }}" required>
    </div>
</div>

<script>
    function setDate(elem) {
        // console.log(arg.dataset.from);
         elem.className + " active";
        let from = elem.dataset.from;
        let to = elem.dataset.to;

        document.getElementById('from').value=from;
        document.getElementById('to').value=to;
    }
</script>
