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

public class CB3Controller implements Initializable {
	private Stage stage;
	private Scene scene;
	private Parent root;
	
	@FXML Label sizeLabel1;
	@FXML Label bahanLabel1;
	@FXML Label warnaLabel1;
	@FXML Label eksLabel1;
	@FXML Label pulauLabel1;
	
	@FXML ChoiceBox<String> sizeChoiceBox1;
	@FXML ChoiceBox<String> bahanChoiceBox1;
	@FXML ChoiceBox<String> warnaChoiceBox1;
	@FXML ChoiceBox<String> eksChoiceBox1;
	@FXML ChoiceBox<String> pulauChoiceBox1;
	
	public String[] size1 = {"S [70-72] - Rp 159.000","M [74-77] - Rp 179.000","L [79-82] - Rp 199.000","XL [84-88] - Rp 219.000"};
	@Override
	public void initialize(URL arg0, ResourceBundle arg1) {
	    sizeChoiceBox1.getItems().addAll(size1);
	    sizeChoiceBox1.setOnAction(this::getSize1);
	    
	    initialize11(arg0, arg1);
	    initialize21(arg0, arg1);
	    initialize31(arg0, arg1);
	    initialize41(arg0, arg1);
	}	
	public void getSize1(ActionEvent event) {
		String mySize1 = sizeChoiceBox1.getValue();
		sizeLabel1.setText("Ukuran yang anda pilih adalah " + mySize1);		
	}
	
	private String[] bahan1 = {"Drill - Rp 12.000","Polyester - Rp 12.000","Katun - Rp 15.000","Denim - Rp 25.000"};
	
	public void initialize11(URL arg0, ResourceBundle arg1) {	
		bahanChoiceBox1.getItems().addAll(bahan1);
		bahanChoiceBox1.setOnAction(this::getBahan1);
	}
	public void getBahan1(ActionEvent event) {
		String myBahan1 = bahanChoiceBox1.getValue();
		bahanLabel1.setText("Bahan yang anda pilih adalah " + myBahan1);
	}
	
	private String[] warna1 = {"Navy","Hitam","Putih","Cokelat"};
	public void initialize21(URL arg0, ResourceBundle arg1) {	
		warnaChoiceBox1.getItems().addAll(warna1);
		warnaChoiceBox1.setOnAction(this::getWarna1);	
	}
	public void getWarna1(ActionEvent event) {
		String myWarna1 = warnaChoiceBox1.getValue();
		warnaLabel1.setText("Warna yang anda pilih adalah " + myWarna1);
	}
	
	private String[] eks1 = {"JNE","J&T","TIKI","SICEPAT"};
	public void initialize31(URL arg0, ResourceBundle arg1) {	
		eksChoiceBox1.getItems().addAll(eks1);
		eksChoiceBox1.setOnAction(this::getEks1);	
	}
	public void getEks1(ActionEvent event) {
		String myEks1 = eksChoiceBox1.getValue();
		eksLabel1.setText("Ekspedisi yang anda pilih adalah " + myEks1);
	}
	
	private String[] pulau1 = {"Sumatra - Rp 30.000","Jawa - Rp 40.000","Kalimantan - Rp 70.000","Sulawesi - Rp 85.000","Papua - Rp 100.000"};
	public void initialize41(URL arg0, ResourceBundle arg1) {	
		pulauChoiceBox1.getItems().addAll(pulau1);
		pulauChoiceBox1.setOnAction(this::getPulau1);	
	}
	public void getPulau1(ActionEvent event) {
		String myPulau1 = pulauChoiceBox1.getValue();
		pulauLabel1.setText("Pulau tempat pengiriman adalah " + myPulau1);
	}
	@FXML
	private void switchToScene6() {
	    try {
	        FXMLLoader loader = new FXMLLoader(getClass().getResource("Scene6.fxml"));
	        Parent root = loader.load();

	        Scene6Controller controller = loader.getController();
	        String selectedSize = sizeChoiceBox1.getValue(); // Mengakses nilai pilihan dari myChoiceBox
	        String selectedWarna = warnaChoiceBox1.getValue();
	        String selectedEks = eksChoiceBox1.getValue();
	        String selectedPulau = pulauChoiceBox1.getValue();
	        String selectedBahan = bahanChoiceBox1.getValue();

	        controller.setSelectedSize(selectedSize);
	        controller.setSelectedWarna(selectedWarna);
	        controller.setSelectedEks(selectedEks);
	        controller.setSelectedPulau(selectedPulau);
	        controller.setSelectedBahan(selectedBahan);
	        

	        controller.initialize(); // Panggil metode initialize secara manual untuk menghitung total harga

	        Scene scene = new Scene(root);
	        Stage stage = (Stage) sizeChoiceBox1.getScene().getWindow();
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
