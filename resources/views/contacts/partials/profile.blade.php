<div class="col-md-3">

  <!-- Profile Image -->
  <div class="box box-solid">
    <div class="box-body box-profile">
      <p class="text-muted">
          <i class="fa fa-calendar margin-r-5 text-muted" aria-hidden="true"></i> <small title="{{ $contact->created_at }}">Added {{ $contact->created_at->diffForHumans() }}</small>
      </p>

      <img class="profile-user-img img-responsive img-circle" src="{{asset('/img/user2-160x160.jpg')}}" alt="User profile picture">

      {{--<h3 class="profile-username text-center"></h3>--}}

      <p class="text-muted text-center">
        <small>@if(!empty($contact->role)) {{ $contact->role }} in @endif @if($contact->company) {{ $contact->company->name }} @endif</small>
      </p>

        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              Messages <b><a class="pull-right">1,322</a></b>
            </li>
            <li class="list-group-item">
              Engagement <b><a class="pull-right text-warning">45%</a></b>
            </li>
            <li class="list-group-item">
              Rapportivenes <b><a class="pull-right text-success">80%</a></b>
            </li>
        </ul>
        <div class="row margin-bottom">
            <div class="col-xs-12  btn-group btn-group-justified">
                <a href="#" class="btn btn-flat btn-default"><i class="fa fa-phone" aria-hidden="true"></i> Call</a>
                <a href="#" class="btn btn-flat btn-default"><i class="fa fa-paper-plane"></i> Send SMS</a>
            </div>
        </div>
        {{-- @TODO point this link to new message form --}}
        <div class="row">
            <div class="col-xs-12">
                <a href="#" class="btn btn-flat btn-primary btn-block"><i class="fa fa-envelope-o"></i> Send e-mail</a>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

  <!-- About Me Box -->
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title">About</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <ul class="list-group list-group-unbordered">
        <li class="list-group-item">
          <i class="fa fa-envelope margin-r-5 text-muted" aria-hidden="true"></i><span>{{ $contact->email }}</span>
        </li>
        @if(!empty($contact->phone))
            <li class="list-group-item">
                <i class="fa fa-phone margin-r-5 text-muted" aria-hidden="true"></i><span>{{ $contact->phone }}</span>
            </li>
        @endif
        @if(count($contact->tags))
            <li class="list-group-item">
                <i class="fa fa-tags margin-r-5 text-muted"></i>
                @foreach($contact->tags as $tag)
                    <span class="label label-primary">{{ $tag->name }}</span>
                @endforeach
            </li>
        @endif
        @if(!empty($contact->notes))
            <li class="list-group-item">
                <i class="fa fa-file-text-o margin-r-5 text-muted"></i>{{ $contact->notes }}
            </li>
        @endif
      </ul>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<!-- /.col -->
<div class="col-md-9">
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a aria-expanded="true" href="#activity" data-toggle="tab">Activity</a></li>
      <li class=""><a aria-expanded="false" href="#timeline" data-toggle="tab">Timeline</a></li>
      <li class=""><a aria-expanded="false" href="#settings" data-toggle="tab">Settings</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="activity">
        <!-- Post -->
        <div class="post">
          <div class="user-block">
            <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                <span class="username">
                  <a href="#">Jonathan Burke Jr.</a>
                  <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                </span>
            <span class="description">Shared publicly - 7:30 PM today</span>
          </div>
          <!-- /.user-block -->
          <p>
            Lorem ipsum represents a long-held tradition for designers,
            typographers and the like. Some people hate it and argue for
            its demise, but others ignore the hate as they create awesome
            tools to help create filler text for everyone from bacon lovers
            to Charlie Sheen fans.
          </p>
          <ul class="list-inline">
            <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
            <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
            </li>
            <li class="pull-right">
              <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                (5)</a></li>
          </ul>

          <input class="form-control input-sm" placeholder="Type a comment" type="text">
        </div>
        <!-- /.post -->

        <!-- Post -->
        <div class="post clearfix">
          <div class="user-block">
            <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                <span class="username">
                  <a href="#">Sarah Ross</a>
                  <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                </span>
            <span class="description">Sent you a message - 3 days ago</span>
          </div>
          <!-- /.user-block -->
          <p>
            Lorem ipsum represents a long-held tradition for designers,
            typographers and the like. Some people hate it and argue for
            its demise, but others ignore the hate as they create awesome
            tools to help create filler text for everyone from bacon lovers
            to Charlie Sheen fans.
          </p>

          <form class="form-horizontal">
            <div class="form-group margin-bottom-none">
              <div class="col-sm-9">
                <input class="form-control input-sm" placeholder="Response">
              </div>
              <div class="col-sm-3">
                <button type="submit" class="btn btn-flat btn-danger pull-right btn-block btn-sm">Send</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.post -->

        <!-- Post -->
        <div class="post">
          <div class="user-block">
            <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                <span class="username">
                  <a href="#">Adam Jones</a>
                  <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                </span>
            <span class="description">Posted 5 photos - 5 days ago</span>
          </div>
          <!-- /.user-block -->
          <div class="row margin-bottom">
            <div class="col-sm-6">
              <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-6">
                  <img class="img-responsive" src="../../dist/img/photo2.png" alt="Photo">
                  <br>
                  <img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo">
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                  <img class="img-responsive" src="../../dist/img/photo4.jpg" alt="Photo">
                  <br>
                  <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <ul class="list-inline">
            <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
            <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
            </li>
            <li class="pull-right">
              <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                (5)</a></li>
          </ul>

          <input class="form-control input-sm" placeholder="Type a comment" type="text">
        </div>
        <!-- /.post -->
      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="timeline">
        <!-- The timeline -->
        <ul class="timeline timeline-inverse">
          <!-- timeline time label -->
          <li class="time-label">
                <span class="bg-red">
                  10 Feb. 2014
                </span>
          </li>
          <!-- /.timeline-label -->
          <!-- timeline item -->
          <li>
            <i class="fa fa-envelope bg-blue"></i>

            <div class="timeline-item">
              <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

              <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

              <div class="timeline-body">
                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                quora plaxo ideeli hulu weebly balihoo...
              </div>
              <div class="timeline-footer">
                <a class="btn btn-primary btn-xs">Read more</a>
                <a class="btn btn-danger btn-xs">Delete</a>
              </div>
            </div>
          </li>
          <!-- END timeline item -->
          <!-- timeline item -->
          <li>
            <i class="fa fa-user bg-aqua"></i>

            <div class="timeline-item">
              <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

              <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
              </h3>
            </div>
          </li>
          <!-- END timeline item -->
          <!-- timeline item -->
          <li>
            <i class="fa fa-comments bg-yellow"></i>

            <div class="timeline-item">
              <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

              <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

              <div class="timeline-body">
                Take me to your leader!
                Switzerland is small and neutral!
                We are more like Germany, ambitious and misunderstood!
              </div>
              <div class="timeline-footer">
                <a class="btn btn-warning btn-flat btn-xs">View comment</a>
              </div>
            </div>
          </li>
          <!-- END timeline item -->
          <!-- timeline time label -->
          <li class="time-label">
                <span class="bg-green">
                  3 Jan. 2014
                </span>
          </li>
          <!-- /.timeline-label -->
          <!-- timeline item -->
          <li>
            <i class="fa fa-camera bg-purple"></i>

            <div class="timeline-item">
              <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

              <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

              <div class="timeline-body">
                <img src="http://placehold.it/150x100" alt="..." class="margin">
                <img src="http://placehold.it/150x100" alt="..." class="margin">
                <img src="http://placehold.it/150x100" alt="..." class="margin">
                <img src="http://placehold.it/150x100" alt="..." class="margin">
              </div>
            </div>
          </li>
          <!-- END timeline item -->
          <li>
            <i class="fa fa-clock-o bg-gray"></i>
          </li>
        </ul>
      </div>
      <!-- /.tab-pane -->

      <div class="tab-pane" id="settings">
        <form class="form-horizontal">
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Name</label>

            <div class="col-sm-10">
              <input class="form-control" id="inputName" placeholder="Name" type="email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

            <div class="col-sm-10">
              <input class="form-control" id="inputEmail" placeholder="Email" type="email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Name</label>

            <div class="col-sm-10">
              <input class="form-control" id="inputName" placeholder="Name" type="text">
            </div>
          </div>
          <div class="form-group">
            <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

            <div class="col-sm-10">
              <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

            <div class="col-sm-10">
              <input class="form-control" id="inputSkills" placeholder="Skills" type="text">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label>
                  <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-danger">Submit</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
  </div>
  <!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->
