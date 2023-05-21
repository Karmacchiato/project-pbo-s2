package application;

import java.awt.Button;
import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.ChoiceBox;
import javafx.scene.control.Label;
import javafx.stage.Stage;
import application.Scene5Controller;

public class CB4Controller implements Initializable {
	private Stage stage;
	private Scene scene;
	private Parent root;
	
	@FXML Label sizeLabel2;
	@FXML Label seriLabel2;
	@FXML Label warnaLabel2;
	@FXML Label eksLabel2;
	@FXML Label pulauLabel2;
	
	@FXML ChoiceBox<String> sizeChoiceBox2;
	@FXML ChoiceBox<String> seriChoiceBox2;
	@FXML ChoiceBox<String> warnaChoiceBox2;
	@FXML ChoiceBox<String> eksChoiceBox2;
	@FXML ChoiceBox<String> pulauChoiceBox2;
	
	public String[] size2 = {"[38]","[39]","[40]","[41]","[42]","[43]"};
	@Override
	public void initialize(URL arg0, ResourceBundle arg1) {
	    sizeChoiceBox2.getItems().addAll(size2);
	    sizeChoiceBox2.setOnAction(this::getSize2);
	    
	    initialize12(arg0, arg1);
	    initialize22(arg0, arg1);
	    initialize32(arg0, arg1);
	    initialize42(arg0, arg1);
	}	
	public void getSize2(ActionEvent event) {
		String mySize2 = sizeChoiceBox2.getValue();
		sizeLabel2.setText("Ukuran yang anda pilih adalah " + mySize2 +" - Rp 150.000");		
	}
	
	private String[] seri2 = {"Seri 01 - Rp 219.000","Seri 02 - Rp 259.000","Seri 03 - Rp 299.000","Seri 04 - Rp 349.000"};
	
	public void initialize12(URL arg0, ResourceBundle arg1) {	
		seriChoiceBox2.getItems().addAll(seri2);
		seriChoiceBox2.setOnAction(this::getSeri2);
	}
	public void getSeri2(ActionEvent event) {
		String mySeri2 = seriChoiceBox2.getValue();
		seriLabel2.setText("Seri yang anda pilih adalah " + mySeri2);
	}
	
	private String[] warna2 = {"Hitam-Putih","Hitam-Merah","Abu-Abu","Putih"};
	public void initialize22(URL arg0, ResourceBundle arg1) {	
		warnaChoiceBox2.getItems().addAll(warna2);
		warnaChoiceBox2.setOnAction(this::getWarna2);	
	}
	public void getWarna2(ActionEvent event) {
		String myWarna2 = warnaChoiceBox2.getValue();
		warnaLabel2.setText("Warna yang anda pilih adalah " + myWarna2);
	}
	
	private String[] eks2 = {"JNE","J&T","TIKI","SICEPAT"};
	public void initialize32(URL arg0, ResourceBundle arg1) {	
		eksChoiceBox2.getItems().addAll(eks2);
		eksChoiceBox2.setOnAction(this::getEks2);	
	}
	public void getEks2(ActionEvent event) {
		String myEks2 = eksChoiceBox2.getValue();
		eksLabel2.setText("Ekspedisi yang anda pilih adalah " + myEks2);
	}
	
	private String[] pulau2 = {"Sumatra - Rp 30.000","Jawa - Rp 40.000","Kalimantan - Rp 70.000","Sulawesi - Rp 85.000","Papua - Rp 100.000"};
	public void initialize42(URL arg0, ResourceBundle arg1) {	
		pulauChoiceBox2.getItems().addAll(pulau2);
		pulauChoiceBox2.setOnAction(this::getPulau2);	
	}
	public void getPulau2(ActionEvent event) {
		String myPulau2 = pulauChoiceBox2.getValue();
		pulauLabel2.setText("Pulau tempat pengiriman adalah " + myPulau2);
	}
	@FXML
	private void switchToScene7() {
	    try {
	        FXMLLoader loader = new FXMLLoader(getClass().getResource("Scene7.fxml"));
	        Parent root = loader.load();

	        Scene7Controller controller = loader.getController();
	        String selectedSize = sizeChoiceBox2.getValue(); // Mengakses nilai pilihan dari myChoiceBox
	        String selectedWarna = warnaChoiceBox2.getValue();
	        String selectedEks = eksChoiceBox2.getValue();
	        String selectedPulau = pulauChoiceBox2.getValue();
	        String selectedSeri = seriChoiceBox2.getValue();

	        controller.setSelectedSize(selectedSize);
	        controller.setSelectedWarna(selectedWarna);
	        controller.setSelectedEks(selectedEks);
	        controller.setSelectedPulau(selectedPulau);
	        controller.setSelectedSeri(selectedSeri);
	        

	        controller.initialize(); // Panggil metode initialize secara manual untuk menghitung total harga

	        Scene scene = new Scene(root);
	        Stage stage = (Stage) seriChoiceBox2.getScene().getWindow();
	        stage.setScene(scene);
	    } catch (IOException e) {
	        e.printStackTrace();
	    }
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public void switchToScene1(ActionEvent event) throws IOException {
		Parent root = FXMLLoader.load(getClass().getResource("Scene1.fxml"));
		stage = (Stage)((Node)event.getSource()).getScene().getWindow();
		scene = new Scene(root);
		stage.setScene(scene);
		stage.show();
	}
}
