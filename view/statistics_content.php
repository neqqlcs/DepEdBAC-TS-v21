
<link rel="stylesheet" href="assets/css/statistics.css">

<div class="stats-content-wrapper">
    <h3>Project Statistics</h3>

    <div class="stats-grid">
        <div class="stat-item">
            <h3>Total Projects</h3>
            <span class="stat-value"><?php echo $totalProjects; ?></span>
        </div>
        <!-- Projects Done - Now clickable -->
        <a href="<?php echo url('project_tracker.php', ['status' => 'done']); ?>" class="stat-item clickable-stat">
            <h3>Projects Done</h3>
            <span class="stat-value done"><?php echo $finishedProjects; ?></span>
            <span class="stat-percentage">(<?php echo $percentageDone; ?>%)</span>
        </a>
        <!-- Projects Ongoing - Now clickable -->
        <a href="<?php echo url('project_tracker.php', ['status' => 'ongoing']); ?>" class="stat-item clickable-stat">
            <h3>Projects Ongoing</h3>
            <span class="stat-value ongoing"><?php echo $ongoingProjects; ?></span>
            <span class="stat-percentage">(<?php echo $percentageOngoing; ?>%)</span>
        </a>
        <div class="stat-item breakdown-container">
            <h3>Ongoing Breakdown</h3>
            <?php if ($ongoingProjects > 0): ?>
                <div class="breakdown-mini-grid">
                    <?php foreach ($ongoingBreakdownData as $data): ?>
                        <div class="breakdown-mini-item">
                            <span class="mini-label"><?php echo htmlspecialchars($data['name']); ?></span>
                            <span class="mini-count"><?php echo $data['count']; ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <span class="stat-value" style="font-size: 1.1em; color: #f57c00;">All projects finished!</span>
            <?php endif; ?>
        </div>
    </div>

    <h3 style="margin-top: 40px; color: #333;">All Projects by Current Stage (Including Finished)</h3>
    <table class="stage-stats-table">
        <thead>
            <tr>
                <th>Stage Name</th>
                <th>Number of Projects</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($stagesOrder as $stage) {
                echo "<tr>";
                echo "<td class='stage-name'>" . htmlspecialchars($stage) . "</td>";
                echo "<td>" . ($stageCounts[$stage] ?? 0) . "</td>";
                echo "</tr>";
            }
            echo "<tr>";
            echo "<td class='stage-name'>Finished Projects</td>";
            echo "<td>" . ($stageCounts['Finished'] ?? 0) . "</td>";
            echo "</tr>";
            ?>
        </tbody>
    </table>

</div>

