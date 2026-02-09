<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $name }} - Resume</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f5f5;
        }

        .resume-container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: linear-gradient(135deg, #005a9c 0%, #0077cc 100%);
            color: white;
            padding: 40px 30px;
            display: flex;
            gap: 30px;
            align-items: flex-start;
        }

        .photo-box {
            width: 200px;
            height: 250px;
            background: rgba(255, 255, 255, 0.1);
            flex-shrink: 0;
            overflow: hidden;
            border-radius: 8px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .photo-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .header-content {
            flex-grow: 1;
            padding-top: 10px;
        }

        .header h1 {
            margin-bottom: 8px;
            font-size: 2.5em;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .header h3 {
            margin-bottom: 25px;
            font-weight: 400;
            font-size: 1.3em;
            opacity: 0.95;
            letter-spacing: 0.5px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px 40px;
            margin-top: 20px;
        }

        .info-grid p {
            margin-bottom: 10px;
            display: flex;
            gap: 10px;
            font-size: 0.95em;
        }

        .info-grid strong {
            min-width: 120px;
            font-weight: 600;
            opacity: 0.9;
        }

        .info-grid a {
            color: white;
            text-decoration: none;
            border-bottom: 1px solid transparent;
            transition: border-bottom 0.2s ease;
        }

        .info-grid a:hover {
            border-bottom: 1px solid white;
        }

        .content {
            padding: 40px 30px;
        }

        .summary {
            margin-bottom: 30px;
            line-height: 1.8;
            font-size: 1.05em;
            color: #444;
            padding: 20px;
            background-color: #f9f9f9;
            border-left: 4px solid #005a9c;
            border-radius: 4px;
        }

        .section-title {
            color: #005a9c;
            border-bottom: 3px solid #005a9c;
            margin-top: 35px;
            margin-bottom: 20px;
            font-weight: 700;
            font-size: 1.5em;
            padding-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .timeline-item {
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e0e0e0;
        }

        .timeline-item:last-child {
            border-bottom: none;
        }

        .timeline-year {
            float: left;
            width: 120px;
            font-weight: 700;
            color: #005a9c;
            font-size: 1em;
            padding-top: 2px;
        }

        .timeline-content {
            margin-left: 140px;
        }

        .timeline-content strong {
            font-size: 1.15em;
            color: #005a9c;
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .timeline-content em {
            color: #666;
            font-style: normal;
            display: block;
            margin-bottom: 8px;
        }

        .timeline-content p {
            color: #555;
            line-height: 1.7;
            margin-top: 8px;
        }

        .skills-list {
            margin-left: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 8px;
        }

        .skills-list li {
            margin-bottom: 8px;
            padding: 8px 12px;
            background-color: #f0f7ff;
            border-left: 3px solid #005a9c;
            border-radius: 3px;
            list-style: none;
            transition: background-color 0.2s ease;
        }

        .skills-list li:hover {
            background-color: #e3f2ff;
        }
        
        .age-local {
            font-style: italic;
            color: rgba(255, 255, 255, 0.7);
            margin-left: 5px;
            font-size: 0.9em;
        }

        @media print {
            body {
                background-color: white;
            }
            
            .resume-container {
                box-shadow: none;
            }
            
            .header {
                background: #005a9c;
            }
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: center;
                text-align: center;
                padding: 30px 20px;
            }

            .photo-box {
                margin-bottom: 20px;
            }

            .info-grid {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .info-grid p {
                flex-direction: column;
                gap: 2px;
            }

            .timeline-year {
                float: none;
                width: auto;
                margin-bottom: 5px;
            }

            .timeline-content {
                margin-left: 0;
            }

            .content {
                padding: 30px 20px;
            }

            .skills-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <div class="resume-container">
        <div class="header">
            @if(!empty($photo_path))
                <div class="photo-box">
                    <img src="{{ Storage::url($photo_path) }}" alt="Profile Photo">
                </div>
            @endif

            <div class="header-content">
                <h1>{{ $name }}</h1>
                <h3>{{ $job_title }}</h3>

                <div class="info-grid">
                    <div>
                        <p><strong>Phone:</strong> {{ $phone }}</p>
                        <p><strong>Email:</strong> <a href="mailto:{{ $email }}">{{ $email }}</a></p>

                        @if(!empty($linkedin))
                            <p><strong>LinkedIn:</strong>
                                <a href="{{ $linkedin }}" target="_blank">
                                    {{ str_replace(['https://', 'http://'], '', $linkedin) }}
                                </a>
                            </p>
                        @endif

                        @if(!empty($gitlab))
                            <p><strong>GitLab:</strong>
                                <a href="{{ $gitlab }}" target="_blank">
                                    {{ str_replace(['https://', 'http://'], '', $gitlab) }}
                                </a>
                            </p>
                        @endif
                    </div>

                    <div>
                        <p><strong>Address:</strong> {{ $address }}</p>
                        <p><strong>Date of Birth:</strong> {{ date('F j, Y', strtotime($dob)) }}</p>
                        <p>
                            <strong>Age:</strong> {{ $age }}
                            @if($age == 21)
                                <span class="age-local">(Dalawampu't isa)</span>
                            @elseif($age >= 22 && $age <= 23)
                                <span class="age-local">
                                    @if($age == 22)
                                        (Duapulo ket dua)
                                    @else
                                        (Duapulo ket tallo)
                                    @endif
                                </span>
                            @elseif($age >= 24)
                                <span class="age-local">
                                    @if($age == 24)
                                        (Duamplo tan apat)
                                    @elseif($age == 25)
                                        (Duamplo tan lima)
                                    @elseif($age == 26)
                                        (Duamplo tan anim)
                                    @elseif($age == 27)
                                        (Duamplo tan pito)
                                    @elseif($age == 28)
                                        (Duamplo tan walo)
                                    @elseif($age == 29)
                                        (Duamplo tan siam)
                                    @elseif($age == 30)
                                        (Duamplo tan trenta)
                                    @else
                                        ({{ $age }} taon)
                                    @endif
                                </span>
                            @endif
                        </p>
                        <p><strong>Gender:</strong> {{ $gender }}</p>
                        <p><strong>Nationality:</strong> {{ $nationality }}</p>

                        @if(!empty($religion))
                            <p><strong>Religion:</strong> {{ $religion }}</p>
                        @endif

                        @if(!empty($civil_status))
                            <p><strong>Civil Status:</strong> {{ $civil_status }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="content">

            @if(!empty($summary))
                <p class="summary">{{ $summary }}</p>
            @endif

            @if(!empty($education))
                <h3 class="section-title">Education</h3>
                @foreach($education as $edu)
                    <div class="timeline-item">
                        <div class="timeline-year">{{ $edu['year'] ?? '' }}</div>
                        <div class="timeline-content">
                            <strong>{{ $edu['degree'] ?? '' }}</strong><br>
                            <em>{{ $edu['school'] ?? '' }}</em>
                        </div>
                    </div>
                @endforeach
            @endif

            @if(!empty($skills_array))
                <h3 class="section-title">Skills</h3>
                <ul class="skills-list">
                    @foreach($skills_array as $skill)
                        <li>{{ $skill }}</li>
                    @endforeach
                </ul>
            @endif

            @if(!empty($projects))
                <h3 class="section-title">Projects</h3>
                @foreach($projects as $project)
                    <div class="timeline-item">
                        <div class="timeline-year">{{ $project['year'] ?? '' }}</div>
                        <div class="timeline-content">
                            <strong>{{ $project['title'] ?? '' }}</strong>
                            <p>{{ $project['description'] ?? '' }}</p>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>

</body>
</html>