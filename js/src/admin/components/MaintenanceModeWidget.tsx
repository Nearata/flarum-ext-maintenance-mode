import app from "flarum/admin/app";
import DashboardWidget from "flarum/admin/components/DashboardWidget";
import Alert from "flarum/common/components/Alert";

export default class MaintenanceModeWidget extends DashboardWidget {
  className() {
    return "NearataMaintenanceModeWarningWidget";
  }

  content() {
    const title = app.translator.trans(
      "nearata-maintenance-mode.admin.dashboard.maintenance_widget.title"
    );
    const description = app.translator.trans(
      "nearata-maintenance-mode.admin.dashboard.maintenance_widget.detail"
    );

    return (
      <Alert
        type="error"
        dismissible={false}
        title={title}
        icon="fas fa-radiation"
      >
        {description}
      </Alert>
    );
  }
}
