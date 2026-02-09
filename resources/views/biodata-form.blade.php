<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        h1 {
            color: #005a9c;
            margin-bottom: 10px;
        }
        
        .subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
        }
        
        .form-section {
            margin-bottom: 30px;
        }
        
        .section-title {
            color: #005a9c;
            border-bottom: 2px solid #005a9c;
            padding-bottom: 8px;
            margin-bottom: 20px;
            font-size: 1.2em;
            font-weight: bold;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
        }
        
        .form-group.full-width {
            grid-column: 1 / -1;
        }
        
        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
            font-size: 14px;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="url"],
        input[type="tel"],
        input[type="date"],
        select,
        textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            font-family: Arial, sans-serif;
        }
        
        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #005a9c;
            box-shadow: 0 0 0 2px rgba(0, 90, 156, 0.1);
        }
        
        textarea {
            resize: vertical;
            min-height: 80px;
        }
        
        .dynamic-section {
            border: 1px solid #e0e0e0;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 15px;
            background-color: #fafafa;
        }
        
        .dynamic-item {
            background: white;
            padding: 15px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            margin-bottom: 10px;
            position: relative;
        }
        
        .remove-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
        }
        
        .remove-btn:hover {
            background: #c82333;
        }
        
        .add-btn {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 10px;
        }
        
        .add-btn:hover {
            background: #218838;
        }
        
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            flex: 1;
        }
        
        .btn-preview {
            background: #005a9c;
            color: white;
        }
        
        .btn-preview:hover {
            background: #004a7c;
        }
        
        .btn-pdf {
            background: #dc3545;
            color: white;
        }
        
        .btn-pdf:hover {
            background: #c82333;
        }
        
        .helper-text {
            font-size: 12px;
            color: #666;
            margin-top: 3px;
        }
        
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Biodata Information Form</h1>
        <p class="subtitle">Fill in your information below to generate your biodata</p>
        
        <form id="biodataForm" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Personal Information -->
            <div class="form-section">
                <h3 class="section-title">Personal Information</h3>
                
                <!-- Photo Upload -->
                <div class="form-group full-width" style="margin-bottom: 20px;">
                    <label for="photo">Profile Photo</label>
                    <input type="file" id="photo" name="photo" accept="image/jpeg,image/jpg,image/png" onchange="previewPhoto(event)">
                    <span class="helper-text">Upload a profile photo (JPEG, JPG, PNG - Max 2MB). Recommended size: 200x250px</span>
                    <div id="photoPreview" style="margin-top: 10px; display: none;">
                        <img id="photoPreviewImg" style="width: 200px; height: 250px; object-fit: cover; border: 2px solid #005a9c;">
                    </div>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" value="John Louie M. Corong" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="job_title">Position/Title *</label>
                        <input type="text" id="job_title" name="job_title" value="Information Technology Student" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number *</label>
                        <input type="tel" id="phone" name="phone" value="09123213377" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" value="jcorong23@gmail.com" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="linkedin">LinkedIn Profile</label>
                        <input type="url" id="linkedin" name="linkedin" value="https://linkedin.com/in/jonhlouiecorong">
                    </div>
                    
                    <div class="form-group">
                        <label for="gitlab">GitLab Profile</label>
                        <input type="url" id="gitlab" name="gitlab" value="https://gitlab.com/johnlouiecorong">
                    </div>
                    
                    <div class="form-group">
                        <label for="dob">Date of Birth *</label>
                        <input type="date" id="dob" name="dob" value="2002-06-23" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="gender">Gender *</label>
                        <select id="gender" name="gender" required>
                            <option value="Male" selected>Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="nationality">Nationality *</label>
                        <input type="text" id="nationality" name="nationality" value="Filipino" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="religion">Religion</label>
                        <input type="text" id="religion" name="religion" value="Born Again">
                    </div>
                    
                    <div class="form-group">
                        <label for="civil_status">Civil Status</label>
                        <select id="civil_status" name="civil_status">
                            <option value="Single" selected>Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Divorced">Divorced</option>
                        </select>
                    </div>
                    
                    <div class="form-group full-width">
                        <label for="address">Address *</label>
                        <input type="text" id="address" name="address" value="Ventinilla Sta Barbara Pangasinan" required>
                    </div>
                    
                    <div class="form-group full-width">
                        <label for="summary">Professional Summary</label>
                        <textarea id="summary" name="summary">Bachelor of Science in Information Technology student at Pangasinan State University - Urdaneta Campus with a passion for software development and web technologies.</textarea>
                    </div>
                </div>
            </div>
            
            <!-- Skills -->
            <div class="form-section">
                <h3 class="section-title">Skills</h3>
                <div class="form-group">
                    <label for="skills">Skills (comma-separated)</label>
                    <textarea id="skills" name="skills">PHP, Laravel, JavaScript, Web Development, Database Management, Dart, Flutter, Android Development</textarea>
                    <span class="helper-text">Separate each skill with a comma</span>
                </div>
            </div>
            
            <!-- Education -->
            <div class="form-section">
                <h3 class="section-title">Education</h3>
                <div id="educationContainer">
                    <div class="dynamic-item">
                        <div class="form-grid">
                            <div class="form-group">
                                <label>Year/Period</label>
                                <input type="text" name="education[0][year]" value="2021-2025">
                            </div>
                            <div class="form-group">
                                <label>Degree/Level</label>
                                <input type="text" name="education[0][degree]" value="Bachelor of Science in Information Technology">
                            </div>
                            <div class="form-group full-width">
                                <label>School/Institution</label>
                                <input type="text" name="education[0][school]" value="Pangasinan State University - Urdaneta Campus">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="add-btn" onclick="addEducation()">+ Add Education</button>
            </div>
            
            <!-- Projects -->
            <div class="form-section">
                <h3 class="section-title">Projects</h3>
                <div id="projectsContainer">
                    <div class="dynamic-item">
                        <div class="form-grid">
                            <div class="form-group">
                                <label>Year</label>
                                <input type="text" name="projects[0][year]" value="2023">
                            </div>
                            <div class="form-group">
                                <label>Project Title</label>
                                <input type="text" name="projects[0][title]" value="DriveHub">
                            </div>
                            <div class="form-group full-width">
                                <label>Description</label>
                                <textarea name="projects[0][description]">Capstone Project - Project details and achievements</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="add-btn" onclick="addProject()">+ Add Project</button>
            </div>
            
            <!-- Buttons -->
            <div class="button-group">
                <button type="submit" class="btn btn-preview" formaction="{{ route('biodata.preview') }}" formtarget="_blank">Preview in New Tab</button>
            </div>
        </form>
    </div>
    
    <script>
        let educationCount = 1;
        let projectCount = 1;
        
        function previewPhoto(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('photoPreviewImg').src = e.target.result;
                    document.getElementById('photoPreview').style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }
        
        function addEducation() {
            const container = document.getElementById('educationContainer');
            const item = document.createElement('div');
            item.className = 'dynamic-item';
            item.innerHTML = `
                <button type="button" class="remove-btn" onclick="this.parentElement.remove()">Remove</button>
                <div class="form-grid">
                    <div class="form-group">
                        <label>Year/Period</label>
                        <input type="text" name="education[${educationCount}][year]">
                    </div>
                    <div class="form-group">
                        <label>Degree/Level</label>
                        <input type="text" name="education[${educationCount}][degree]">
                    </div>
                    <div class="form-group full-width">
                        <label>School/Institution</label>
                        <input type="text" name="education[${educationCount}][school]">
                    </div>
                </div>
            `;
            container.appendChild(item);
            educationCount++;
        }
        
        function addProject() {
            const container = document.getElementById('projectsContainer');
            const item = document.createElement('div');
            item.className = 'dynamic-item';
            item.innerHTML = `
                <button type="button" class="remove-btn" onclick="this.parentElement.remove()">Remove</button>
                <div class="form-grid">
                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" name="projects[${projectCount}][year]">
                    </div>
                    <div class="form-group">
                        <label>Project Title</label>
                        <input type="text" name="projects[${projectCount}][title]">
                    </div>
                    <div class="form-group full-width">
                        <label>Description</label>
                        <textarea name="projects[${projectCount}][description]"></textarea>
                    </div>
                </div>
            `;
            container.appendChild(item);
            projectCount++;
        }
    </script>
</body>
</html>