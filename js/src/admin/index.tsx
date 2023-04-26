import MaintenanceModeWidget from "./components/MaintenanceModeWidget";
import app from "flarum/admin/app";
import DashboardPage from "flarum/admin/components/DashboardPage";
import { extend } from "flarum/common/extend";

app.initializers.add("nearata-maintenance-mode", () => {
  extend(DashboardPage.prototype, "availableWidgets", function (items) {
    if (app.data.nearataMaintenanceMode) {
      items.add("maintenance", <MaintenanceModeWidget />, 100);
    }
  });

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
