DEVSNOTES: System for simple notes

What does the project do?
- List notes
- Open a single note
- Insert new notes
- Update a note
- Delete a note

What is the project's data structure?
- Storage
    - id;
    - title;
    - body;

Endpoints? (METHOD) /url (PARAMS)
- (GET) /api/notes (no params); -> List notes -> /api/getall.php
- (GET) /api/note/id (no params); -> List a single note -> /api/get.php?id=123
- (POST) /api/note (title, body); -> Insert new notes -> /api/insert.php
- (PUT) /api/note/id (title, body); -> Update a note -> /api/update.php
- (DELETE) /api/note/id (no params); -> Delete a note -> /api/delete.php (id)