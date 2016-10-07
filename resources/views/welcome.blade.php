@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="/bower_components/bootstrap-calendar/css/calendar.css">
@endsection
@section('content')
    <div class="col-sm-1 col-sm-offset-1">
        <img style="width: 60px; margin-bottom: 20px" src="img/mailman.png">
    </div>
    <div class="col-sm-9">
        <h1 class="text-yellow">Sistem Informasi Persuratan Kegiatan Ormawa</h1><br>
    </div>
    <div class="page-header">

        <div class="pull-right form-inline">
            <div class="btn-group">
                <button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
                <button class="btn" data-calendar-nav="today">Today</button>
                <button class="btn btn-primary" data-calendar-nav="next">Next >></button>
            </div>
            <div class="btn-group">
                <button class="btn btn-warning" data-calendar-view="year">Year</button>
                <button class="btn btn-warning active" data-calendar-view="month">Month</button>
                <button class="btn btn-warning" data-calendar-view="week">Week</button>
                <button class="btn btn-warning" data-calendar-view="day">Day</button>
            </div>
        </div>

        <h3></h3>
    </div>

    <div class="col-sm-12">

        <div id="calendar"></div>


    </div>
    <div class="modal fade" id="events-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3>Event</h3>
                </div>
                <div class="modal-body" style="height: 400px">
                </div>
                <div class="modal-footer">
                    <a href="#" data-dismiss="modal" class="btn">Close</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="/bower_components/underscore/underscore-min.js"></script>
    <script type="text/javascript" src="/bower_components/bootstrap-calendar/js/calendar.js"></script>
    <script type="text/javascript" src="/bower_components/bootstrap-calendar/js/language/id-ID.js"></script>

    <script type="text/javascript">
        var calendar = $("#calendar").calendar({
            language: 'id-ID',
            modal: "#events-modal",
            modal_type : "ajax",
            modal_title : function (e) { return e.title },
            onAfterViewLoad: function(view) {
                $('.page-header h3').text(this.getTitle());
                $('.btn-group button').removeClass('active');
                $('button[data-calendar-view="' + view + '"]').addClass('active');
            },
            tmpl_path: "/bower_components/bootstrap-calendar//tmpls/",
            events_source: '/api/events'
        });
        $('.btn-group button[data-calendar-nav]').each(function() {
            var $this = $(this);
            $this.click(function() {
                calendar.navigate($this.data('calendar-nav'));
            });
        });

        $('.btn-group button[data-calendar-view]').each(function() {
            var $this = $(this);
            $this.click(function() {
                calendar.view($this.data('calendar-view'));
            });
        });



    </script>
@endsection
