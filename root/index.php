<?php
require 'db.php';

// Helper function to nicely print result rows
function print_table($result) {
    if (!$result || $result->num_rows === 0) {
        echo "<p class='no-results'>No results found.</p>";
        return;
    }

    echo "<div class='table-wrapper'>";
    echo "<table>";
    // header
    echo "<thead><tr>";
    while ($field = $result->fetch_field()) {
        echo "<th>" . htmlspecialchars($field->name) . "</th>";
    }
    echo "</tr></thead>";

    // rows
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}

$activeQuery = $_POST['query_type'] ?? null;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>University DB Queries</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background: #0f172a;
            color: #e5e7eb;
        }

        .page {
            max-width: 1100px;
            margin: 0 auto;
            padding: 32px 16px 48px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        header h1 {
            margin: 0;
            font-size: 28px;
        }

        header p {
            margin: 4px 0 0;
            color: #9ca3af;
            font-size: 14px;
        }

        .badge {
            padding: 4px 10px;
            border-radius: 999px;
            border: 1px solid #4b5563;
            font-size: 12px;
            color: #9ca3af;
        }

        .section-title {
            margin-top: 24px;
            margin-bottom: 8px;
            font-size: 18px;
            font-weight: 600;
        }

        .section-subtitle {
            margin: 0 0 16px;
            font-size: 13px;
            color: #9ca3af;
        }

        .grid {
            display: grid;
            gap: 16px;
        }

        @media (min-width: 900px) {
            .grid-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        .card {
            background: #020617;
            border-radius: 12px;
            padding: 16px 18px 18px;
            border: 1px solid #1f2937;
            box-shadow: 0 16px 40px rgba(0,0,0,0.35);
        }

        .card.prof {
            border-top: 3px solid #38bdf8;
        }

        .card.course {
            border-top: 3px solid #22c55e;
        }

        .card.student {
            border-top: 3px solid #f97316;
        }

        .card h2 {
            margin: 0 0 4px;
            font-size: 17px;
        }

        .card small {
            display: block;
            margin-bottom: 10px;
            font-size: 12px;
            color: #9ca3af;
        }

        form {
            margin-bottom: 10px;
        }

        label {
            display: block;
            font-size: 13px;
            margin-bottom: 6px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 6px 8px;
            border-radius: 6px;
            border: 1px solid #4b5563;
            background: #020617;
            color: #e5e7eb;
            font-size: 14px;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: #38bdf8;
            box-shadow: 0 0 0 1px rgba(56,189,248,0.4);
        }

        button {
            margin-top: 8px;
            padding: 6px 14px;
            border-radius: 999px;
            border: none;
            background: linear-gradient(to right, #38bdf8, #818cf8);
            color: #0b1120;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
        }

        button:hover {
            filter: brightness(1.05);
        }

        .results-title {
            margin: 10px 0 6px;
            font-size: 14px;
            font-weight: 600;
            color: #e5e7eb;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
            margin-top: 4px;
        }

        thead {
            background: #020617;
        }

        th, td {
            padding: 6px 8px;
            border-bottom: 1px solid #111827;
            text-align: left;
        }

        th {
            font-weight: 600;
            color: #e5e7eb;
        }

        tr:nth-child(even) td {
            background: #020617;
        }

        tr:nth-child(odd) td {
            background: #020617;
        }

        .no-results {
            font-size: 12px;
            color: #9ca3af;
            margin: 4px 0 0;
        }

        .query-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 11px;
            color: #9ca3af;
            margin-bottom: 4px;
        }

        .query-dot {
            width: 7px;
            height: 7px;
            border-radius: 999px;
        }

        .dot-prof { background: #38bdf8; }
        .dot-course { background: #22c55e; }
        .dot-student { background: #f97316; }
    </style>
</head>
<body>
<div class="page">
    <header>
        <div>
            <h1>University Database – Query Interface</h1>
            <p>Run pre-defined professor, course, and student queries on your MySQL database.</p>
        </div>
        <div class="badge">CPSC 332 · Project Queries</div>
    </header>

    <!-- PROFESSOR & COURSE QUERIES -->
    <h2 class="section-title">Professor &amp; Course Queries</h2>
    <p class="section-subtitle">
        Use these to look up information related to professors, courses, and sections.
    </p>

    <div class="grid grid-2">
        <!-- QUERY 1: Professor SSN => classes -->
        <div class="card prof">
            <div class="query-tag">
                <span class="query-dot dot-prof"></span>
                <span>Professor Query</span>
            </div>
            <h2>Query 1: Classes taught by a professor</h2>
            <small>Input a professor's SSN to list all course titles, classrooms, and meeting times they teach.</small>

            <form method="POST">
                <input type="hidden" name="query_type" value="q1">
                <label>
                    Professor SSN
                    <input type="text" name="prof_ssn" placeholder="e.g. 123456789" required>
                </label>
                <button type="submit">Run Query 1</button>
            </form>

            <?php
            if (
                $_SERVER['REQUEST_METHOD'] === 'POST' &&
                $activeQuery === 'q1' &&
                isset($_POST['prof_ssn'])
            ) {
                $prof_ssn = $_POST['prof_ssn'];

                $sql = "
                    SELECT 
                        c.C_NAME AS Title,
                        s.CLASSROOM,
                        s.MEET_DAYS,
                        s.BEGIN_TIME,
                        s.END_TIME
                    FROM PROFESSOR p
                    JOIN SECTION s
                        ON p.SSN = s.TAUGHT_BY
                    JOIN COURSE c
                        ON s.C_NO = c.C_NUMBER
                    WHERE p.SSN = ?
                ";

                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("s", $prof_ssn);   // s = string; use "i" if numeric
                $stmt->execute();
                $result = $stmt->get_result();

                echo "<div class='results-title'>Results for Professor SSN: " . htmlspecialchars($prof_ssn) . "</div>";
                print_table($result);

                $stmt->close();
            }
            ?>
        </div>

        <!-- QUERY 3: Course number => sections -->
        <div class="card course">
            <div class="query-tag">
                <span class="query-dot dot-course"></span>
                <span>Course / Section Query</span>
            </div>
            <h2>Query 3: Sections of a course</h2>
            <small>Input a course number to list its sections, classrooms, meeting times, and number of enrolled students.</small>

            <form method="POST">
                <input type="hidden" name="query_type" value="q3">
                <label>
                    Course Number
                    <input type="number" name="course_no" placeholder="e.g. 332" required>
                </label>
                <button type="submit">Run Query 3</button>
            </form>

            <?php
            if (
                $_SERVER['REQUEST_METHOD'] === 'POST' &&
                $activeQuery === 'q3' &&
                isset($_POST['course_no'])
            ) {
                $course_no = (int)$_POST['course_no'];

                $sql = "
                    SELECT 
                        s.S_NUMBER,
                        s.CLASSROOM,
                        s.MEET_DAYS,
                        s.BEGIN_TIME,
                        s.END_TIME,
                        COUNT(e.CWID) AS NumStudents
                    FROM SECTION AS s
                    LEFT JOIN ENROLLMENT AS e
                        ON s.S_NUMBER = e.S_NUMBER
                       AND s.C_NO = e.C_NO
                    WHERE s.C_NO = ?
                    GROUP BY
                        s.S_NUMBER,
                        s.CLASSROOM,
                        s.MEET_DAYS,
                        s.BEGIN_TIME,
                        s.END_TIME
                ";

                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("i", $course_no);
                $stmt->execute();
                $result = $stmt->get_result();

                echo "<div class='results-title'>Sections for Course: " . htmlspecialchars($course_no) . "</div>";
                print_table($result);

                $stmt->close();
            }
            ?>
        </div>
    </div>

    <div class="grid grid-2" style="margin-top:16px;">
        <!-- QUERY 2: Course number + section number => count by grade -->
        <div class="card course">
            <div class="query-tag">
                <span class="query-dot dot-course"></span>
                <span>Course / Section Query</span>
            </div>
            <h2>Query 2: Grade distribution for a course section</h2>
            <small>Input a course number and section number to see how many students received each grade.</small>

            <form method="POST">
                <input type="hidden" name="query_type" value="q2">
                <label>
                    Course Number
                    <input type="number" name="course_no_2" placeholder="e.g. 332" required>
                </label>
                <label>
                    Section Number
                    <input type="number" name="section_no_2" placeholder="e.g. 1" required>
                </label>
                <button type="submit">Run Query 2</button>
            </form>

            <?php
            if (
                $_SERVER['REQUEST_METHOD'] === 'POST' &&
                $activeQuery === 'q2' &&
                isset($_POST['course_no_2'], $_POST['section_no_2'])
            ) {
                $course_no_4  = (int)$_POST['course_no_2'];
                $section_no_4 = (int)$_POST['section_no_2'];

                $sql = "
                    SELECT 
                        GRADE,
                        COUNT(*) AS NumStudents
                    FROM 
                        ENROLLMENT
                    WHERE 
                        C_NO = ?      
                        AND S_NUMBER = ?
                    GROUP BY 
                        GRADE
                    ORDER BY 
                        GRADE
                ";

                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("ii", $course_no_4, $section_no_4);
                $stmt->execute();
                $result = $stmt->get_result();

                echo "<div class='results-title'>Grade counts for Course " . htmlspecialchars($course_no_4) . 
                     ", Section " . htmlspecialchars($section_no_4) . "</div>";
                print_table($result);

                $stmt->close();
            }
            ?>
        </div>

        <!-- STUDENT QUERIES -->
        <div>
            <h2 class="section-title">Student Queries</h2>
            <p class="section-subtitle">
                Use this to look up a specific student's courses and grades.
            </p>

            <!-- QUERY 4: Student CWID => courses + grades -->
            <div class="card student">
                <div class="query-tag">
                    <span class="query-dot dot-student"></span>
                    <span>Student Query</span>
                </div>
                <h2>Query 4: Courses and grades for a student</h2>
                <small>Input a student's CWID to list all courses they have taken and the grades received.</small>

                <form method="POST">
                    <input type="hidden" name="query_type" value="q4">
                    <label>
                        Student CWID
                        <input type="text" name="cwid" placeholder="e.g. 123456789" required>
                    </label>
                    <button type="submit">Run Query 4</button>
                </form>

                <?php
                if (
                    $_SERVER['REQUEST_METHOD'] === 'POST' &&
                    $activeQuery === 'q4' &&
                    isset($_POST['cwid'])
                ) {
                    $cwid = $_POST['cwid'];

                    $sql = "
                        SELECT 
                            c.C_NUMBER,
                            c.C_NAME,
                            e.GRADE
                        FROM ENROLLMENT AS e
                        JOIN COURSE AS c
                            ON e.C_NO = c.C_NUMBER
                        WHERE e.CWID = ?
                    ";

                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param("s", $cwid);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    echo "<div class='results-title'>Courses &amp; Grades for CWID: " . htmlspecialchars($cwid) . "</div>";
                    print_table($result);

                    $stmt->close();
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
