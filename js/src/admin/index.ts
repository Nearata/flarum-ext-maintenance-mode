import app from "flarum/admin/app";

app.initializers.add("nearata-maintenance-mode", () => {
  app.extensionData.for("nearata-maintenance-mode").registerPermission(
    {
      icon: "fas fa-radiation",
      label: app.translator.trans(
        "nearata-maintenance-mode.admin.permissions.bypass"
      ),
      permission: "nearata-maintenance-mode.bypass",
    },
    "view"
  );
});
