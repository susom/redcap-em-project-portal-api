<?php

namespace Stanford\ProjectPortal;

/** @var \Stanford\ProjectPortal\ProjectPortal $module */

try {
    $portalProjectId = filter_var($_POST['project_portal_id'], FILTER_SANITIZE_NUMBER_INT);
    $portalProjectName = filter_var($_POST['project_portal_name'], FILTER_SANITIZE_STRING);
    $portalProjectDescription = filter_var($_POST['project_portal_description'], FILTER_SANITIZE_STRING);
    $module->attachToProjectPortal($portalProjectId, $portalProjectName, $portalProjectDescription);
} catch (\LogicException $e) {
    header("Content-type: application/json");
    http_response_code(404);
    echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
}
?>