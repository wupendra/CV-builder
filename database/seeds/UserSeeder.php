<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = '{
            "basics": {
            "id": "2",
            "name": "John Doe",
            "label": "Programmer",
            "picture": "/img/avatar.jpg",
            "email": "john@gmail.com",
            "phone": "(912) 555-4321",
            "website": "http://johndoe.com",
            "summary": "A summary of John Doe...contains some of the material of John Doe."
            },
            "location": {
              "address": "2712 Broadway St",
              "postal_code": "CA 94115",
              "city": "San Francisco",
              "country_code": "US",
              "region": "California"
            },
            "profiles": [{
              "network": "Twitter",
              "username": "john",
              "url": "http://twitter.com/john"
            },
            {
              "network": "Facebook",
              "username": "john",
              "url": "http://facebook.com/john"
            }],
          "work": [{
            "company": "Company",
            "position": "President",
            "website": "http://company.com",
            "start_date": "2013-01-01",
            "end_date": "2014-01-01",
            "summary": "Some of the work of the john doe. His summary of the work he did for the company. some of the description is written here.",
            "highlights": [
              "Some of the work of the john doe. His summary of the work he did for the company. some of the description is written here."
            ]
          }],
          "volunteer": [{
            "organization": "Organization",
            "position": "Volunteer",
            "website": "http://organization.com/",
            "start_date": "2012-01-01",
            "end_date": "2013-01-01",
            "summary": "Description...",
            "highlights": [
              "Awarded \'Volunteer of the Month\'"
            ]
          }],
          "education": [{
            "institution": "University",
            "area": "Software Development",
            "study_type": "Bachelor",
            "start_date": "2011-01-01",
            "end_date": "2013-01-01",
            "gpa": "4.0",
            "courses": [
              "DB1101 - Basic SQL",
              "DB1101 - Basic PHP"
            ]
          }],
          "awards": [{
            "title": "Award",
            "date": "2014-11-01",
            "awarder": "Company",
            "summary": "There is no spoon."
          }],
          "publications": [{
            "name": "Publication",
            "publisher": "Company",
            "release_date": "2014-10-01",
            "website": "http://publication.com",
            "summary": "Some of the work of the john doe. His summary of the work he did for the company. some of the description is written here...."
          }],
          "skills": [{
            "name": "Web Development",
            "level": "Master",
            "keywords": [
              "HTML",
              "CSS",
              "Javascript"
            ]
          }],
          "languages": [{
            "language": "English",
            "fluency": "Native speaker"
          }],
          "interests": [{
            "name": "Wildlife",
            "keywords": [
              "Ferrets",
              "Unicorns"
            ]
          }],
          "references": [{
            "name": "Jane Doe",
            "reference": "Some of the work of the john doe. His summary of the work he did for the company. some of the description is written here...."
          }]
        }';
        $data = json_decode($data,true);
        $data['basics']['password'] = Hash::make('somePassword');
        $user = User::create($data['basics']);
        $user->location()->create($data['location']);
        $user->profiles()->createMany($data['profiles']);
        $user->work()->createMany($data['work']);
        $user->education()->createMany($data['education']);
        $user->awards()->createMany($data['awards']);
        $user->publications()->createMany($data['publications']);
        $user->skills()->createMany($data['skills']);
        $user->languages()->createMany($data['languages']);
        $user->interests()->createMany($data['interests']);
        $user->references()->createMany($data['references']);

    }
}
