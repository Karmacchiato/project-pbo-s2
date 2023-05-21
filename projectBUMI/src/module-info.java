module Test {
	requires javafx.controls;
	requires javafx.graphics;
	requires javafx.fxml;
	requires java.desktop;
	
	opens application to javafx.graphics, javafx.fxml;
}
