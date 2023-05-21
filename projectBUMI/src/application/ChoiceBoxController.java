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

public class ChoiceBoxController implements Initializable {
	private Stage stage;
	private Scene scene;
	private Parent root;
	

	@FXML Label myLabel;
	
	@FXML ChoiceBox<String> myChoiceBox;
	
	
	public String[] size = {"Small - Rp 50.000","Medium - Rp 55.000","Large - Rp 60.000","Xtra Large - Rp 65.000"};
	
	
	@Override
	public void initialize(URL arg0, ResourceBundle arg1) {
	    myChoiceBox.getItems().addAll(size);
	    myChoiceBox.setOnAction(this::getSize);

	    initialize1(arg0, arg1);
	    initialize2(arg0, arg1);
	    initialize3(arg0, arg1);
	    initialize4(arg0, arg1);
	}

	
	public void getSize(ActionEvent event) {
		String mySize = myChoiceBox.getValue();
		myLabel.setText("Ukuran yang anda pilih adalah " + mySize);
		
	}
	@FXML
	private Label warnaLabel;
	@FXML
	private ChoiceBox<String> warnaChoiceBox;
	private String[] warna = {"Merah","Hitam","Putih","Biru"};
	
	
	public void initialize1(URL arg0, ResourceBundle arg1) {
		
		warnaChoiceBox.getItems().addAll(warna);
		warnaChoiceBox.setOnAction(this::getWarna);
		
	}
	
	public void getWarna(ActionEvent event) {
		String myWarna = warnaChoiceBox.getValue();
		warnaLabel.setText("Warna yang anda pilih adalah " + myWarna);
	}
	@FXML
	private Label eksLabel;
	@FXML
	private ChoiceBox<String> eksChoiceBox;
	private String[] eks = {"JNE","J&T","TIKI","SICEPAT"};
	public void initialize2(URL arg0, ResourceBundle arg1) {
		
		eksChoiceBox.getItems().addAll(eks);
		eksChoiceBox.setOnAction(this::getEks);
		
	}
	
	public void getEks(ActionEvent event) {
		String myEks = eksChoiceBox.getValue();
		eksLabel.setText("Ekspedisi yang anda pilih adalah " + myEks);
	}
	
	@FXML
	private Label pulauLabel;
	@FXML
	private ChoiceBox<String> pulauChoiceBox;
	
	private String[] pulau = {"Sumatra - Rp 30.000","Jawa - Rp 40.000","Kalimantan - Rp 70.000","Sulawesi - Rp 85.000","Papua - Rp 100.000"};
	public void initialize3(URL arg0, ResourceBundle arg1) {
		
		pulauChoiceBox.getItems().addAll(pulau);
		pulauChoiceBox.setOnAction(this::getPulau);
		
	}
	
	public void getPulau(ActionEvent event) {
		String myPulau = pulauChoiceBox.getValue();
		pulauLabel.setText("Pulau tempat pengiriman adalah " + myPulau);
	}
	
	@FXML 
	private Label bahanLabel;
	@FXML
	private ChoiceBox<String> bahanChoiceBox;
	
	private String[] bahan = {"Katun - Rp 5.000","Spandex - Rp 6.000","Polyester - Rp 7.000","Linen - Rp 8.000"};
	public void initialize4(URL arg0, ResourceBundle arg1) {
		
		bahanChoiceBox.getItems().addAll(bahan);
		bahanChoiceBox.setOnAction(this::getBahan);
		
	}
	
	public void getBahan(ActionEvent event) {
		String myBahan = bahanChoiceBox.getValue();
		bahanLabel.setText("Bahan yang anda pilih adalah " + myBahan);
	}
	
	@FXML
	private void switchToScene5() {
	    try {
	        FXMLLoader loader = new FXMLLoader(getClass().getResource("Scene5.fxml"));
	        Parent root = loader.load();

	        Scene5Controller controller = loader.getController();
	        String selectedSize = myChoiceBox.getValue();
	        String selectedWarna = warnaChoiceBox.getValue();
	        String selectedEks = eksChoiceBox.getValue();
	        String selectedPulau = pulauChoiceBox.getValue();
	        String selectedBahan = bahanChoiceBox.getValue();

	        controller.setSelectedSize(selectedSize);
	        controller.setSelectedWarna(selectedWarna);
	        controller.setSelectedEks(selectedEks);
	        controller.setSelectedPulau(selectedPulau);
	        controller.setSelectedBahan(selectedBahan);
	        

	        controller.initialize();

	        Scene scene = new Scene(root);
	        Stage stage = (Stage) myChoiceBox.getScene().getWindow();
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
	

