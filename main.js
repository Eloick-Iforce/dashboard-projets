var ide = "vscode-insiders"; // Set your IDE here

function openWithVSCode(element) {
  const projectPath = element.getAttribute("data-path");
  const link = element.getAttribute("id");

  if (projectPath.startsWith("\\\\wsl")) {
    const wslPath = projectPath.replace(/\\/g, "/");
    const link = "http://localhost:3000";
    window.open(link, "_blank");
    openInIDE(wslPath);
  } else {
    const localProjectPath = "D:/Sites/" + projectPath;
    window.open(link, "_blank");
    openInIDE(localProjectPath);
  }
}

function openInIDE(path) {
  switch (ide) {
    case "vscode":
      window.open("vscode-insiders://file/" + path);
      break;
    case "vscode-insiders":
      window.open("vscode-insiders://file/" + path);
      break;
    case "atom":
      window.open("atom://core/open/file?filename=" + path);
      break;
    case "phpstorm":
      window.open("phpstorm://open?file=" + path);
      break;
    // Add more cases for other IDEs as needed
    default:
      // Default code if no IDE matches
      break;
  }
}
