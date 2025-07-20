
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IP Tracker Dashboard</title>
  <style>
    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
      padding: 20px;
      color: #333;
    }
    h1 {
      text-align: center;
      color: #1877f2;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background: white;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #1877f2;
      color: white;
    }
  </style>
</head>
<body>
  <h1>📡 Lịch sử truy cập IP</h1>
  <table>
    <thead>
      <tr>
        <th>Thời gian</th>
        <th>IP</th>
        <th>Thiết bị</th>
        <th>Trình duyệt</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $logFile = 'ip-log.txt';
        if (file_exists($logFile)) {
          $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
          foreach (array_reverse($lines) as $line) {
            $parts = explode("|", $line);
            echo "<tr>";
            echo "<td>" . htmlspecialchars($parts[0]) . "</td>";
            echo "<td>" . htmlspecialchars($parts[1]) . "</td>";
            echo "<td>" . htmlspecialchars($parts[2]) . "</td>";
            echo "<td>" . htmlspecialchars($parts[3]) . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='4'>Chưa có dữ liệu truy cập nào.</td></tr>";
        }
      ?>
    </tbody>
  </table>
</body>
</html>
