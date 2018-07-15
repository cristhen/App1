<div class="modal fade" id="election-{{ $election->id }}" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span>  Elección {{ $election->name }}</h4>
            </div>
            <br>
            <div class="modal-body" style="padding: 5px;">
                <div class="row vote-results results">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-left: 5px;">
                        Excellent
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                <span class="sr-only">40% Excellent (success)</span>
                            </div>
                        </div>
                        Good
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                <span class="sr-only">20% Good (primary)</span>
                            </div>
                        </div>
                        Can Be Improved
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                                <span class="sr-only">60% Can Be Improved (warning)</span>
                            </div>
                        </div>
                        bad
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                                <span class="sr-only">80% Bad (danger)</span>
                            </div>
                        </div>
                        No Comment
                        <div class="progress">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%">
                                <span class="sr-only">80% No Comment (info)</span>
                            </div>
                        </div>
                        Overall
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" style="width: 20%">
                                <span class="sr-only">35% Complete (success)</span>
                            </div>
                            <div class="progress-bar progress-bar-primary" style="width: 40%">
                                <span class="sr-only">20% Complete (primary)</span>
                            </div>
                            <div class="progress-bar progress-bar-warning" style="width: 25%">
                                <span class="sr-only">10% Complete (warning)</span>
                            </div>
                            <div class="progress-bar progress-bar-danger" style="width: 10%">
                                <span class="sr-only">10% Complete (danger)</span>
                            </div>
                            <div class="progress-bar progress-bar-info" style="width: 5%">
                                <span class="sr-only">10% Complete (info)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>