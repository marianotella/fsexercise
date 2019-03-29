## FS Exersice
Create a single page application that displays a list of items. These items must include a picture and a description.

#### Requirements:
##### The application functionality should satisfy the next use cases:
- The user should be able to sort the items on the list using a drag and drop functionality.
- There should be a counter in the page that shows how many items are being displayed.
- Each item should have the actions: edit and delete. Edit allows a user to update the image of an item and the description text. Delete allows a user to remove an item from the list and update the counter.
- A functionality to add a new item should exist. This functionality consist on a form to upload an image (jpg, gif and png extensions of 320px x 320px size) and a description text (max chars 300).
- All the actions of the application should be done without refreshing the page (sort, add, edit and delete) and saved immediately.
- On a page refresh action, it should be displayed the last state of the list.
- State data should be stored in the backend.

##### Technologies to use:
###### Frontend: 
- Vanilla JavaScript with jQuery (or any other js library) with any plugin and html5, css3, sass or less.
- You CANNOT use a JavaScript Framework like: angularjs, react, riot, vue.js, etc.
###### Backend:
- The exercise can be developed in any language.
- You CAN use any framework that you want with no restrictions.
- You MUST use MongoDB as database.
- You CANNOT use a solution like firebase, feathersjs or layer alike

#### Runtime:
Please submit the application with a defined stack (installing all required dependencies) using docker-compose. The application should count with a docker-compose.yml file that should allow us to run the application without the need of installing missing dependencies.

#### Command
- Go to project folder and run command "docker-compose up".
- If run in daemon mode -d, the application doesn't work.
