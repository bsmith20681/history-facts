## To run locally

1. click on live server button below
2. run "php -S localhost:3000 -t public_html"

## To do List

x Connect app to a Database
x Add Create fact
x Delete Fact
x Edit Fact
x refactor pdo
x refactor app to follow mvc pattern
x General clean up
x create a footer partial
x refactor alerts on success and be able to close out of them
x add character limit to fact text
x add check so you can't put in a year past the current year
x Filter the facts table on the homepage by clicking on the year
x add pagination (should have 10 facts per page)
x buy server space, learn to ssh into server
x launch on digital ocean droplet

## app refactors for better understanding

x redo the router (split it up into different files, pretty sure this could be combined into one controller)

- update router to include methods
- add in a validator tool for comments and adding facts
- add in comments following php doc standard

### Eventually add these features

- add in user authentication (only users can update, create, and delete facts. They can edit or delete any fact.)
- refactor to follow oop
- create tests using pest php
- Narrow down user auth so users can only edit, update and delete their own facts.
- single fact view (and update routes /fact/{id}/edit /fact/{id} to view a fact etc)
- comment on a single fact view
- like and unlike a single fact
- display number of likes and comments in row on table in index view
- Upload a single image or short video along with your fact
- add a moderator role where you can update and delete any fact

# history-facts
