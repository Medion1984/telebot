<div class="card card-info card-outline mt-3">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-exclamation-circle"></i>
            Примечания <small>к характеристикам изделия.</small>
        </h3>
    </div>
    <div class="card-body">
        @foreach($notices as $notice)
        <div>
            <p><b>{{ $loop->iteration }}</b> {{ $notice->description }}</p>
        </div>
        @endforeach
    </div>
</div>