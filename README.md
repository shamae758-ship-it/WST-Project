MY Personal Task Manager

Project Code: WST21-PM-2026-SF  
Student Name: Crisha Mae G. Donaire  
Course & Year: BSIT 2nd Year  
Database Used:SQLite   

Features
- Add Task: Create a new task with a title and description.
- View Tasks: Display all pending and completed tasks dynamically.
- Edit Task: Modify existing task titles and descriptions.
- Delete Task: Remove tasks with confirmation.
- Update Status: Toggle task status between Pending and Completed.

 Technical Flow
This application strictly follows the Laravel MVC architecture:
1. Routes (`routes/web.php`): Map incoming relative HTTP endpoints (`/tasks`, `/tasks/{id}`, etc.) to controller actions.
2. Controller (`TaskController`): Manages request validation, database interactions via the Eloquent model, and redirects.
3. Model (`Task`): Handles task data representation and database interactions.
4. Blade Views (`index.blade.php`, `edit.blade.php`): Renders clean UI components using custom CSS styling and Laravel directive helpers.

   MY SYSTEM
   <img width="557" height="599" alt="image" src="https://github.com/user-attachments/assets/940026ce-47df-48e2-84cb-70b26964324f" />
   <img width="537" height="565" alt="image" src="https://github.com/user-attachments/assets/72c691d0-1d3c-4bdb-9c85-af00cdafaedc" />
   <img width="522" height="555" alt="image" src="https://github.com/user-attachments/assets/28133299-061e-4d4a-986f-62bb65dd8a96" />
   <img width="542" height="461" alt="image" src="https://github.com/user-attachments/assets/fd74c282-8a30-4674-881e-148b4387fa7e" />



