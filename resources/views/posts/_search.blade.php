<a class="btn btn-primary" href="#" id="select-button"> <i class="fa fa-search"></i> Search</a>

<div class="row" id="select-div">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body card-block">

                <form action="{{ route('posts.index') }}" method="GET">
                    @csrf
                    <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="title"><strong>Title*</strong></label>
                                    <input type="text" id="title" name="title" class="form-control" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="slug"><strong>Slug*</strong></label>
                                    <input type="text" id="slug" name="slug" class="form-control" placeholder="Slug">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                    <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>

                </form>
            </div>
        </div>
    </div>
</div>