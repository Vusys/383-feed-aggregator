@extends('_layouts.master')

@section('title', '383 Feed Aggregator')

@section('body')
    <section class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-3 mb-3" id="title">Viewing Feed: <span><em>None</em></span></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <ul class="list-group" id="list-group"></ul>
            </div>
            <div class="col-9">
                <div class="card-columns" id="cards"></div>
            </div>
        </div>
    </section>

    <script>
        $(function () {
            let aggregatesUrl = '{{ route('api.aggregates') }}';
            let apiUrl = '{{ route('api.places.top_places.aggregate', ['aggregate' => 'slug']) }}';

            $.getJSON(aggregatesUrl, function (response) {
                $.each(response.data, function (index, value) {
                    let card = '<li class="list-group-item"><a href="#" data-slug="' + value.slug + '">' + value.name + '</a></li>';
                    $('#list-group').append(card);
                });
            });

            $(document).on('click', '#list-group .list-group-item a', function () {
                let link = $(this);

                $.getJSON(apiUrl.replace('slug', link.data('slug')), function (response) {
                    $('#cards .card').remove();

                    $('#title span').text(link.text() + ' ');

                    $.each(response.data, function (index, value) {
                        let card =
                            '<div class="card">' +
                            '<img src="' + value.image + '" alt="" class="card-img-top">' +
                            '<div class="card-body">' +
                            '<h5 class="card-title">' + value.name + '</h5>' +
                            '<p class="card-text">' + (value.description ? value.description : '') + '</p>' +
                            '<a href="' + value.link + '" class="btn btn-primary">View</a>' +
                            '</div>' +
                            '</div>';

                        $('#cards').append(card);
                    });
                });
            });
        });
    </script>
@endsection