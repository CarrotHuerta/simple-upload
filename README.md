# PHP File Upload Application

This is a simple PHP-based file upload application that allows users to upload files with certain extensions and size limitations. The application also collects user input for a student name and uses it to generate a unique filename for the uploaded file. Let's break down the different components of this code:

## Features and Functionality

1. **Session Management**: The application uses `session_start()` to manage sessions and display messages to the user.

2. **Frontend Interface**: The HTML and CSS code provide a basic user interface for the file upload form. It uses Materialize CSS for styling and includes a field for the student name and a file input for selecting files to upload.

3. **File Size Validation**: JavaScript is used to validate the size of the selected file before submitting the form. If the file exceeds the maximum file size (10,240,000 bytes or approximately 10MB), an alert message is shown to the user.

4. **File Upload Handling**: The PHP code (`upload.php`) handles the file upload process. It checks if the uploaded file has any errors and extracts various details like filename, size, type, and extension. The uploaded file is then moved to a designated directory (`./uploaded_files/`) with a modified filename that includes the student name and a timestamp.

5. **Filename Generation**: The student name provided in the form is used to generate a unique filename. If no student name is provided, the file is stored with the filename pattern `"NO_NAME!_original_filename"`. This ensures that uploaded files are uniquely identified.

6. **Allowed File Types**: The application restricts uploads to certain file types (e.g., jpg, docx, png, zip, txt, etc.). Files with other extensions will not be accepted.

## How to Use

1. Clone or download the repository to your web server.

2. Ensure that the `uploaded_files` directory is writable by the web server.

3. Open the `index.php` file in a web browser.

4. Enter the student name and select a file to upload.

5. Submit the form. If the file size is within the allowed limit and the file type is supported, the file will be uploaded to the `uploaded_files` directory with a modified filename.

6. You will be redirected to the `index.php` page, where a message will be displayed indicating whether the file upload was successful or if there were any errors.

## Notes

- Make sure to replace `'./uploaded_files/'` with the appropriate path to the directory where you want to store the uploaded files.

- The application uses Materialize CSS and jQuery. Ensure that these dependencies are properly included in your project for the styling and JavaScript functionality to work.

- Remember that this is a basic example and may require additional security measures and error handling before being used in a production environment. It's important to sanitize user inputs and validate file uploads thoroughly to prevent potential security risks.

