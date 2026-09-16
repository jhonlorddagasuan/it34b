<?php
require '../../config/config.php';
require '../../config/functions.php';

requireRole('admin');

logActivity(
    $pdo,
    $_SESSION['user_id'],
    $_SESSION['user_email'],
    'view_activity_logs',
    'success'
);

// Activity Logs Query#3
$stmt = $pdo->query("
    SELECT * FROM activity_logs ORDER BY activity_log_created_at DESC
");

$activities = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }

        /* Header */
        .header {
            background: #1f2937;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 24px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .admin-name {
            font-size: 14px;
            color: #d1d5db;
        }

        .sign-out {
            background: #dc2626;
            color: white;
            text-decoration: none;
            padding: 9px 16px;
            border-radius: 6px;
            font-size: 14px;
            transition: background 0.2s;
        }

        .sign-out:hover {
            background: #b91c1c;
        }

        /* Main Content */
        .container {
            width: 95%;
            max-width: 1400px;
            margin: 35px auto;
        }

        .page-title {
            margin-bottom: 20px;
        }

        .page-title h2 {
            font-size: 28px;
            color: #111827;
        }

        .page-title p {
            margin-top: 5px;
            color: #6b7280;
        }

        /* Table Card */
        .table-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        thead {
            background-color: #374151;
            color: white;
        }

        th {
            padding: 14px 12px;
            text-align: left;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 13px 12px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
            vertical-align: top;
        }

        tbody tr:hover {
            background-color: #f9fafb;
        }

        /* Status */
        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-success {
            background-color: #dcfce7;
            color: #166534;
        }

        .status-failed {
            background-color: #fee2e2;
            color: #991b1b;
        }

        /* Action */
        .action {
            font-weight: 600;
            color: #2563eb;
        }

        /* User Agent */
        .user-agent {
            max-width: 300px;
            word-break: break-word;
            color: #6b7280;
            font-size: 12px;
        }

        /* Empty Logs */
        .no-logs {
            text-align: center;
            padding: 40px;
            color: #6b7280;
        }

        /* Responsive */
        @media (max-width: 768px) {

            .header {
                padding: 15px 20px;
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .header-right {
                width: 100%;
                justify-content: space-between;
            }

            .container {
                width: 95%;
                margin: 20px auto;
            }

            .page-title h2 {
                font-size: 22px;
            }

            .table-card {
                padding: 10px;
            }
        }
    </style>
    <h1></h1>Welcome Admin</h1>
    <a href="../../auth/signout.php">Sign Out</a>
    <table border="1">
        <thead>
            <tr>
                <th>Record ID</th>
                <th>User ID</th>
                <th>User Email</th>
                <th>Action</th>
                <th>Status</th>
                <th>IP Address</th>
                <th>User Agent</th>
                <th>Date & Time</th>
            </tr>
        </thead>
        </tbody>
            <?php foreach($activities as $activity):?>
                <tr> 
                    <td><?= htmlspecialchars($activity['activity_log_id'])?></td>
                    <td><?= htmlspecialchars($activity['user_id'])?></td>
                    <td><?= htmlspecialchars($activity['user_email'])?></td>
                    <td><?= htmlspecialchars($activity['activity_log_action'])?></td>
                    <td><?= htmlspecialchars($activity['activity_log_status'])?></td>
                    <td><?= htmlspecialchars($activity['activity_log_ip_address'])?></td>
                    <td><?= htmlspecialchars($activity['activity_log_user_agent'])?></td>
                    <td><?= htmlspecialchars($activity['activity_log_created_at'])?></td>
                </tr>
            <?php endforeach; ?>
</tbody>
</table>
</body>
</html>