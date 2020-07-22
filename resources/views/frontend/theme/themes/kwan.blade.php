
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $user->name }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,500,600,700|Open+Sans:400,500,600,700' rel='stylesheet' type='text/css'>
    <style>
      .clear-margin {
  margin: 0;
}
.space-top {
  margin-top: 10px;
}
.space-right {
  margin-right: 10px;
}
.icon-left {
  margin-right: 5px;
}
.icon-right {
  margin-left: 5px;
}
.labels {
  word-spacing: 5px;
  line-height: 2;
}
.label-keyword {
  display: inline-block;
  background: #7eb0db;
  color: white;
  font-size: 0.9em;
  padding: 5px;
  border: 1px solid #357ebd;
}
.link-disguise {
  color: inherit;
}
.link-disguise:hover {
  color: inherit;
}
@media (max-width: 992px) {
  .clear-margin-sm {
    margin-bottom: 0;
  }
}
body {
  font-family: 'Lato', "Helvetica Neue", Helvetica, Arial, sans-serif;
  background: #f0f0f0;
  color: #333333;
  font-size: 16px;
}
.text-bolder {
  font-weight: bold;
}
@media only screen {
  .container {
    max-width: 50em;
  }
}
@media (max-width: 480px) {
  ul {
    padding-left: 25px;
  }
  /*
        .mobile-title {
            display: inline-block;
            margin-left: 5px;
            font-weight: bold;
            text-transform: uppercase;
            vertical-align: middle;
        }
*/
  .background-details {
    display: block;
  }
  .background-details .icon {
    max-width: inherit;
    min-width: inherit;
    text-align: left;
  }
  .background-details .icon,
  .background-details .info {
    display: block;
    padding: 10px 0;
  }
  .background-details .title {
    display: none;
  }
  .card-nested {
    padding: 5px 0;
  }
}
.profile-card {
  display: table;
  width: 100%;
}
.profile-pic {
  display: table-cell;
  vertical-align: top;
  padding: 1rem 4rem 0 0 ;
}
.profile-pic img {
  width: 100px;
  height: 100px;
}
.contact-details {
  display: table-cell;
}
.contact-details .detail {
  display: inline-block;
  line-height: 2;
  margin-right: 2rem;
}
.contact-details .detail .icon {
  padding-right: 7px;
  color: #888;
}
.contact-details .detail .info {
  font-size: 0.8em;
}
.social-links {
  line-height: 2.5;
}
.social-link {
  display: block;
}
.social-link span {
  display: inline-block;
  vertical-align: middle;
}
.social-link:hover,
.social-link:focus {
  text-decoration: none;
}
.social-link .fa {
  text-align: center;
  width: 2em;
}
.fa-github {
  color: #454545;
}
.fa-github:hover,
.fa-github:focus {
  text-decoration: none;
  color: #2b2b2b;
}
.fa-twitter {
  color: #33ccff;
}
.fa-twitter:hover,
.fa-twitter:focus {
  text-decoration: none;
  color: #00bfff;
}
.fa-rss {
  color: #f36f24;
}
.fa-rss:hover,
.fa-rss:focus {
  text-decoration: none;
  color: #d8560c;
}
.fa-linkedin {
  color: #007bb6;
}
.fa-linkedin:hover,
.fa-linkedin:focus {
  text-decoration: none;
  color: #005983;
}
.fa-skype {
  color: #12a5f4;
}
.fa-skype:hover,
.fa-skype:focus {
  text-decoration: none;
  color: #0986ca;
}
.fa-stack-overflow {
  color: #8e8e92;
}
.fa-stack-overflow:hover,
.fa-stack-overflow:focus {
  text-decoration: none;
  color: #747479;
}
.fa-soundcloud {
  color: #e8822d;
}
.fa-soundcloud:hover,
.fa-soundcloud:focus {
  text-decoration: none;
  color: #cc6916;
}
.fa-pinterest {
  color: #bd091f;
}
.fa-pinterest:hover,
.fa-pinterest:focus {
  text-decoration: none;
  color: #8c0717;
}
.fa-vimeo {
  color: #17b3e8;
}
.fa-vimeo:hover,
.fa-vimeo:focus {
  text-decoration: none;
  color: #128fba;
}
.fa-behance {
  color: #2c98cf;
}
.fa-behance:hover,
.fa-behance:focus {
  text-decoration: none;
  color: #2379a5;
}
.fa-codepen {
  color: #1c1c1c;
}
.fa-codepen:hover,
.fa-codepen:focus {
  text-decoration: none;
  color: #020202;
}
.fa-foursquare {
  color: #fa4778;
}
.fa-foursquare:hover,
.fa-foursquare:focus {
  text-decoration: none;
  color: #f91554;
}
.fa-reddit {
  color: #545454;
}
.fa-reddit:hover,
.fa-reddit:focus {
  text-decoration: none;
  color: #3b3b3b;
}
.fa-spotify {
  color: #acd200;
}
.fa-spotify:hover,
.fa-spotify:focus {
  text-decoration: none;
  color: #829f00;
}
.fa-dribbble {
  color: #ce366f;
}
.fa-dribbble:hover,
.fa-dribbble:focus {
  text-decoration: none;
  color: #a82959;
}
.fa-facebook {
  color: #4b6daa;
}
.fa-facebook:hover,
.fa-facebook:focus {
  text-decoration: none;
  color: #3b5687;
}
.fa-angellist {
  color: #000000;
}
.fa-angellist:hover,
.fa-angellist:focus {
  text-decoration: none;
  color: #000000;
}
.fa-bitbucket {
  color: #205081;
}
.fa-bitbucket:hover,
.fa-bitbucket:focus {
  text-decoration: none;
  color: #163758;
}
.fa-google-plus {
  color: #bf2a1d;
}
.fa-google-plus:hover,
.fa-google-plus:focus {
  text-decoration: none;
  color: #932016;
}
.background-card h4 {
  font-variant: small-caps;
  color: #777777;
  border-bottom: 1px solid #eeeeee;
  padding-bottom: 1em;
  margin-bottom: 1em;
  line-height: 1.2;
}
.background-card h4:not(:first-child) {
  margin-top: 2em;
}
h4 > .fa,
h4 > .title {
  display: inline-block;
  vertical-align: baseline;
}
h4 > .fa {
  width: 4rem;
}
.content {
  line-height: 1.5;
}
.card {
  background: #ffffff;
  border: 1px solid #e6e6e6;
  border-radius: 3px;
  padding: 2em 3.5em;
}
.card-nested {
  padding: 1.5rem 0 1.5rem 4.2rem;
}
.card-wrapper {
  padding: 5px;
}
.enumeration:not(:last-child):after {
  content: ", ";
}
.enumeration:last-child:after {
  content: ".";
}
@media only screen and (max-width: 768px) {
  .profile-card {
    display: block;
  }
  .contact-details,
  .profile-pic {
    display: block;
    text-align: center;
  }
  .card-nested {
    padding-left: 0;
  }
}
@media only screen and (max-width: 480px) {
  .contact-details .detail {
    display: block;
  }
}
.card-skills {
  position: relative;
}
.skill-info {
  margin-left: 20px;
}
@media only screen and (min-width: 768px) {
  .skill {
    border-left: 9px solid #555555;
  }
  .skill.beginner {
    height: 50%;
    border-color: #e74c3c;
  }
  .skill.intermediate {
    height: 70%;
    border-color: #f1c40f;
  }
  .skill.advanced {
    border-color: #5cb85c;
  }
  .skill.master {
    border-color: black;
  }
}
@media (max-width: 768px) {
  .quote {
    font-size: inherit;
  }
}
@media print {
  body {
    font-size: 10pt;
  }
  a[href]:after {
    content: none !important;
  }
  .pagebreak {
    page-break-before: always;
  }
  .background-card h4:not(:first-child) {
    margin-top: 0 !important;
  }
  .card {
    border: 0;
    padding: 0;
  }
  .container {
    max-width: 100%;
    width: 100%;
  }
  .contact-details .detail .icon {
    color: #888 !important;
  }
  .background-card h4 {
    padding-bottom: 0.5em;
    margin-bottom: 0.5em;
    margin-top: 1em !important;
  }
  h4 > .fa {
    display: none !important;
  }
  .card-nested {
    padding: .5rem 0 .5rem 0;
  }
  .labels {
    display: inline;
  }
  .skill-info {
    margin-left: 0;
  }
  blockquote {
    font-size: 100%;
  }
}

    </style>
  </head>

  <body itemscope itemtype="http://schema.org/Person">
    
    <div class="container">
      <section class="row">
        <div class="card-wrapper">
          <div class="card">
            <div class="profile-card">
                <div class="profile-pic">
                  <img class="media-object img-circle center-block"  data-src="holder.js/100x100"
                    alt="{{ $user->name }}" src="{{ !empty($user->picture)?asset('/uploads/avatars/'.$user->picture):'/img/avatar.jpg' }}" itemprop="image">
                </div>
                <div class="contact-details">
                  <div class="name-and-profession">
                    <h3 class="text-bolder name" itemprop="name"> {{ $user->name }}</h3>
                    <h5 class="text-muted" itemprop="jobTitle">{{ $user->label }}</h5>
                  </div>

                    <div class="detail">
                      <span class="icon">
                        <i class="fa fa-lg fa-envelope"></i>
                      </span>

                      <span class="info">
                        <a href="mailto:{{ $user->email }}" class="link-disguise" itemprop="email">{{ $user->email }}</a>
                      </span>
                    </div>

                    <div class="detail">
                      <span class="icon">
                        <i class="fa fa-lg fa-phone"></i>
                      </span>

                      <a href="tel://(912) 555-4321" class="link-disguise info" itemprop="telephone">
                        {{ $user->phone }}
                      </a>
                    </div>

                    <div class="detail">
                      <span class="icon">
                        <i class="fa fa-lg fa-map-marker"></i>
                      </span>

                        <span class="info">
                          @if($user->location()->exists()){{ $user->location->address }}, {{ $user->location->postal_code }}, {{ $user->location->city }}, {{ $user->location->region?$user->location->region.' region,':'' }} {{ $user->location->country_code }}@endif
                        </span>
                    </div>

                </div>
                
            </div>
            <hr>
            @if($user->profiles()->exists())
            <div class="social-links">
                @forelse($user->profiles as $profile)
                <a class="social-link" href="{{ $profile->url }}" target="_blank">
                  <span class="fa fa-{{ strtolower($profile->network) }} fa-2x"></span> 
                  <span class="social-link-text">{{ $profile->url }}</span>
                </a>
                @empty
                @endforelse
            </div>
            @endif
          </div>

        </div>
      </section>

      <section class="row">
        <div class="card-wrapper">
          <div class="card background-card">

            <h4 id="about"> <span class="fa fa-lg fa-user"></span> <span class="title">About</span> </h4>
            <div class="card-nested" itemprop="description">
              <p>{{ $user->summary }} </p>
            </div>

            <h4 id="work-experience"> <span class="fa fa-lg fa-pencil-square-o"></span> <span class="title">Work Experience</span> </h4>
            <ul class="list-unstyled">
              @forelse($user->work as $work)
                <li class="card-nested">
                  <div class="content has-sidebar">
                    <p class="clear-margin-sm">
                      <strong>{{ $work->position }}</strong>,
                      <a href="{{ $work->website }}" target="_blank">{{ $work->company }}</a>
                    </p>
                    <p class="text-muted">
                      <small>
                        <span class="space-right"> {{ !empty($work->start_date)?$work->start_date->format('F Y'):'' }} - {{ !empty($work->end_date)?$work->end_date->format('F Y'):'Present' }}  </span>
                         <span> <i class="fa fa-clock-o icon-left"></i> {{ $work->period }}  </span> 
                      </small>
                    </p>
                    <p>{{ $work->summary }}</p>
                      <ul>
                          @forelse($work->highlights as $high)
                          <li>{{ $high }}</li>
                          @empty
                          @endforelse
                      </ul>
                  </div>

                </li>
                @empty
                @endforelse
            </ul>

            <h4 id="skills"> <span class="fa fa-lg fa-code"></span> <span class="title">Skills</span> </h4>
            <ul class="list-unstyled">
              @forelse($user->skills as $skill)
                <li class="card-nested skill {{ $skill->name }}">
                  <strong>{{ $skill->name }} ({{ strtolower($skill->level) }}):</strong> 
                  @forelse($skill->keywords as $key)
                   <span class="enumeration">{{ $key }}</span>
                  @empty
                  @endforelse  
                </li>
              @empty
              @endforelse
            </ul>
  
            <h4 id="education"><span class="fa fa-lg fa-mortar-board"></span> <span class="title">Education</span></h4>
            
            <ul class="list-unstyled">
              @forelse($user->education as $education)
                <li class="card-nested">
                  <div class="content has-sidebar">
                    <p class="clear-margin-sm">
                      <strong>{{ $education->area }}, {{ $education->study_type }}</strong>,&nbsp;
                      {{ $education->institution}}
                    </p>
                    <p class="text-muted">
                      <small>
                        {{ $education->start_date->format('F Y') }} - {{ !empty($education->end_date)?$education->end_date->format('F Y'):'Ongoing' }}
                      </small>
                    </p>
                    <i>{{ $education->gpa }}</i>
                    <div class="space-top labels">
                      @forelse($education->courses as $course)
                       <span class="label label-keyword">{{ $course }}</span>
                      @empty
                      @endforelse
                    </div>
                  </div>
                </li>
              @empty
              @endforelse
            </ul>
            @if($user->awards()->exists())
            <h4 id="awards"><span class="fa fa-lg fa-trophy"></span> <span class="title">Awards</span></h4>
            <ul class="list-unstyled">
              @foreach($user->awards as $award)
                <li class="card-nested">
                  <div class="content has-sidebar">
                    <p class="clear-margin-sm" itemprop="award">
                      <strong>{{ $award->title }}</strong>,&nbsp;
                      {{ $award->awarder }}
                    </p>
                    <p class="text-muted">
                      <small> Awarded on: {{ !empty($award->date)?$award->date->format('Y F'):'' }}</small>
                    </p>
                    <p>{{ $award->summary}}</p>
                  </div>
                </li>
              @endforeach
            </ul>
            @endif
            @if($user->volunteer()->exists())
            <h4 id="volunteer-work"><span class="fa fa-lg fa-child"></span> <span class="title">Volunteer Work</span> </h4>
            <ul class="list-unstyled">
              @foreach($user->volunteer as $volunteer)
                <li class="card-nested">
                  <div class="content has-sidebar">
                    <p class="clear-margin-sm">
                      <strong>{{ $volunteer->position }}</strong>,&nbsp;
                      <a href="{{ $volunteer->website }}" target="_blank" >{{ $volunteer->organization }}</a>
                    </p>
                    <p class="text-muted">
                      <small>
                        {{ $volunteer->start_date->format('F Y') }} - {{ !empty($volunteer->end_date)?$volunteer->end_date->format('F Y'):'Present' }}
                      </small>
                    </p>
                    <p>{{ $volunteer->summary }}</p>
                    <ul>
                      @forelse($volunteer->highlights as $high)
                        <li> {{ $high }} </li>
                      @empty
                      @endforelse
                    </ul>
                  </div>
                </li>
              @endforeach
            </ul>
            @endif
            @if($user->publications()->exists())
            <h4  id="publications"><span class="fa fa-lg fa-book"></span> <span class="title">Publications</span> </h4>
            <ul class="list-unstyled">
              @foreach($user->publications as $publication)
                <li class="card-nested">
                  <div class="content has-sidebar">
                    <p class="clear-margin-sm">
                      <strong>
                         <a href="{{ $publication->website }}"  target="_blank">{{ $publication->name }}</a> 
                      </strong>,&nbsp;
                      {{ $publication->publisher }}
                    </p>
                    <p class="text-muted">
                      <small> Published on: {{ !(empty($publication->release_date))?$publication->release_date->format('F, jS Y'):'' }} </small>
                    </p>
                    <p class="clear-margin">{{ $publication->summary }}</p>
                  </div>
                  
                </li>
              @endforeach
            </ul>
            @endif
            @if($user->interests()->exists())
            <h4 id="interests"> <span class="fa fa-lg fa-heart"></span> <span class="title">Interests</span> </h4>
            <ul class="list-unstyled">
              @foreach($user->interests as $interest)
                <li class="card-nested">
                  <p>
                    <strong>{{ $interest->name }}</strong>
                  </p>

                  <div class="space-top labels">
                    @forelse($interest->keywords as $key)
                      <span class="label label-keyword">{{$key}}</span>
                    @empty
                    @endforelse
                  </div>
                </li>
              @endforeach
            </ul>
            @endif
            @if($user->references()->exists())
            <h4 id="references"><span class="fa fa-lg fa-thumbs-up"></span> <span class="title">References</span> </h4>
            <ul class="list-unstyled">
              @foreach($user->references as $reference)
                <li class="card-nested">
                  <p>
                    <strong>{{ $reference->name }}</strong>
                  </p>
                  <blockquote class="quote">
                    <p class="clear-margin">{{ $reference->refereance }}</p>
                  </blockquote>
                </li>
              @endforeach
            </ul>
            @endif
            @if($user->languages()->exists())
            <h4 id="languages"><span class="fa fa-lg fa-language"></span> <span class="title">Languages</span> </h4>
              @foreach($user->languages as $language)
              <p class="card-nested">
                  <span class="enumeration">
                    <strong>{{$language->language}}</strong> ({{$language->fluency}})
                  </span>
              </p>
              @endforeach
            @endif
          </div>
        </div>
      </section>
    </div>
    
  </body>
</html>
