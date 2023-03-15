<div class="card card-info mt-3">
    <div class="card-header d-flex justify-content-center">
        <h3 class="card-title">Форма предварительного заказа</h3>
    </div>
    {!! Form::open(['route' => ['ordering' , $slug]]) !!}
    <div class="card-body">
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible">
            <h7><i class="icon fas fa-ban"></i></h7>
                {{session('error')}}
        </div>
    @elseif(Auth::check() && Auth::user()->canMakeOrder())
        <div class="alert alert-danger alert-dismissible">
            <h7><i class="icon fas fa-ban"></i></h7>
                You cant
        </div>
    @else
        <div class="alert alert-primary" role="alert">
        <i class="fas fa-exclamation-circle"></i>
            После получения предварительного заказа наш специалист свяжется с вами для уточнения деталей таких как размер и цвет заказанного изделия. 
            При необходимости установки будет произведен выезд и замер.
            После уточнения характеристик вам будет выслан инвойс для заключения договора. 
        </div>
        @include('front.errors')
        @if(!Auth::check())
        <div class="form-group">
            <label>Ваше имя</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="owner" value="{{ old('owner') }}">
            </div>
        </div>
        <div class="form-group">
            <label>Введите номер контактного телефона</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;0 (999) 99-99-99&quot;"
                    data-mask="" inputmode="text" placeholder="___-__-__-__ " name="phone" value="{{ old('phone')}}">
            </div>
        </div>
        @endif
        <div class="form-group">
            <label>Введите адрес доставки/установки заказа</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                </div>
                <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Введите город или населенный пункт затем улицу и номер.">
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary btn-block">Предварительный заказ</button>
            </div>
        </div>
    @endif
    </div>
    {!! Form::close() !!}
</div>
