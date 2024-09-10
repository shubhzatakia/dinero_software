<?php
require_once '../models/Candidate.php';

$max_experience = isset($_GET['max_experience']) ? (int)$_GET['max_experience'] : null;
$sort_column = isset($_GET['sort']) ? $_GET['sort'] : 'submission_date';
$sort_order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'ASC' : 'DESC';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 25;
$offset = ($page - 1) * $items_per_page;

$candidate = new Candidate();
$results = $max_experience ? $candidate->getCandidatesByExperience($max_experience) : $candidate->getAllCandidates();

$total_candidates = count($results);
$total_pages = ceil($total_candidates / $items_per_page);

$paginated_results = array_slice($results, $offset, $items_per_page);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Submissions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th a {
            color: black;
            text-decoration: none;
        }
        th a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Candidate Submissions</h2>

    <form method="get">
        <label for="max_experience">Max Years of Experience:</label>
        <input type="number" id="max_experience" name="max_experience" min="0" value="<?= $max_experience ?>"><br><br>
        <input type="submit" value="Filter">
    </form>

    <table>
        <thead>
            <tr>
                <th><a href="?sort=first_name&order=<?= $sort_order == 'ASC' ? 'desc' : 'asc' ?>">First Name</a></th>
                <th><a href="?sort=last_name&order=<?= $sort_order == 'ASC' ? 'desc' : 'asc' ?>">Last Name</a></th>
                <th><a href="?sort=dob&order=<?= $sort_order == 'ASC' ? 'desc' : 'asc' ?>">DOB</a></th>
                <th><a href="?sort=email&order=<?= $sort_order == 'ASC' ? 'desc' : 'asc' ?>">Email</a></th>
                <th><a href="?sort=address&order=<?= $sort_order == 'ASC' ? 'desc' : 'asc' ?>">Address</a></th>
                <th><a href="?sort=phone&order=<?= $sort_order == 'ASC' ? 'desc' : 'asc' ?>">Phone</a></th>
                <th><a href="?sort=position_applied&order=<?= $sort_order == 'ASC' ? 'desc' : 'asc' ?>">Position</a></th>
                <th><a href="?sort=experience_years&order=<?= $sort_order == 'ASC' ? 'desc' : 'asc' ?>">Experience (Years)</a></th>
                <th><a href="?sort=skills&order=<?= $sort_order == 'ASC' ? 'desc' : 'asc' ?>">Skills</a></th>
                <th><a href="?sort=training&order=<?= $sort_order == 'ASC' ? 'desc' : 'asc' ?>">Training & Certifications</a></th>
                <th><a href="?sort=refer&order=<?= $sort_order == 'ASC' ? 'desc' : 'asc' ?>">Refer</a></th>
                <th><a href="?sort=submission_date&order=<?= $sort_order == 'ASC' ? 'desc' : 'asc' ?>">Submission Date</a></th>
                <th>Resume</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($paginated_results as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['first_name']) ?></td>
                    <td><?= htmlspecialchars($row['last_name']) ?></td>
                    <td><?= htmlspecialchars($row['dob']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['address']) ?></td>
                    <td><?= htmlspecialchars($row['phone']) ?></td>
                    <td><?= htmlspecialchars($row['position_applied']) ?></td>
                    <td><?= htmlspecialchars($row['experience_years']) ?></td>
                    <td><?= htmlspecialchars($row['skills']) ?></td>
                    <td><?= htmlspecialchars($row['training']) ?></td>
                    <td><?= htmlspecialchars($row['refer']) ?></td>
                    <td><?= htmlspecialchars($row['submission_date']) ?></td>
                    <td><a href="uploads/<?= htmlspecialchars($row['resume_filename']) ?>" target="_blank">View Resume</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div>
        <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>&max_experience=<?= $max_experience ?>&sort=<?= $sort_column ?>&order=<?= $sort_order ?>">Previous</a>
        <?php endif; ?>

        <?php if ($page < $total_pages): ?>
            <a href="?page=<?= $page + 1 ?>&max_experience=<?= $max_experience ?>&sort=<?= $sort_column ?>&order=<?= $sort_order ?>">Next</a>
        <?php endif; ?>
    </div>
</body>
</html>
