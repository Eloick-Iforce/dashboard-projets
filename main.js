function openWithVSCode(element) {
  const projectPath = element.getAttribute("data-path");
  const link = element.getAttribute("id");

  if (projectPath.startsWith("\\\\wsl")) {
    const wslPath = projectPath.replace(/\\/g, "/");
    const link = "http://localhost:3000";
    window.open(link, "_blank");
    window.open("vscode-insiders://file" + wslPath);
  } else {
    const localProjectPath = "D:/Sites/" + projectPath;
    window.open(link, "_blank");
    window.open("vscode-insiders://file/" + localProjectPath);
  }
}
