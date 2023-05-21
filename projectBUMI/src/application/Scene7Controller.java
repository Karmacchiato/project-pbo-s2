package application;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.control.Label;
import javafx.stage.Stage;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.ChoiceBox;

import java.io.IOException;
import java.util.Collection;
import java.util.HashMap;
import java.util.Map;

public class Scene7Controller {
	private Stage stage;
	private Scene scene;
	private Parent root;
	@FXML
    private Label sizeLabel2;
    @FXML
    private Label warnaLabel2;
    @FXML
    private Label eksLabel2;
    @FXML
    private Label pulauLabel2;
    @FXML
    private Label totalHargaLabel2;
    @FXML
    private Label seriLabel2;
    
    private String selectedSize;
    private String selectedWarna;
    private String selectedEks;
    private String selectedPulau;
    private String selectedSeri;
    
    
    private Map<String, Integer> pulauPriceMap;
    private Map<String, Integer> seriPriceMap;
    
    public void setSelectedSize(String selectedSize) {
        this.selectedSize = selectedSize;
    }

    public void setSelectedWarna(String selectedWarna) {
        this.selectedWarna = selectedWarna;
    }

    public void setSelectedEks(String selectedEks) {
        this.selectedEks = selectedEks;
    }

    public void setSelectedPulau(String selectedPulau) {
        this.selectedPulau = selectedPulau;
    }
    
    public void setSelectedSeri(String selectedSeri) {
        this.selectedSeri = selectedSeri;
    }
    
    public void initialize() {
        displaySelectedOptions(); 
        pulauPriceMap = createPulauPriceMap();
        seriPriceMap = createSeriPriceMap();
        calculateTotalHarga();
    }
    
    
    private Map<String, Integer> createSeriPriceMap() {
        Map<String, Integer> seriPriceMap = new HashMap<>();
        seriPriceMap.put("Seri 01 - Rp 219.000", 219000);
        seriPriceMap.put("Seri 02 - Rp 259.000", 259000);
        seriPriceMap.put("Seri 03 - Rp 299.000", 299000);
        seriPriceMap.put("Seri 04 - Rp 349.000", 349000);
        
        return seriPriceMap;
    }
    private Map<String, Integer> createPulauPriceMap() {
        Map<String, Integer> pulauPriceMap = new HashMap<>();
        pulauPriceMap.put("Sumatra - Rp 30.000", 30000);
        pulauPriceMap.put("Jawa - Rp 40.000", 40000);
        pulauPriceMap.put("Kalimantan - Rp 70.000", 70000);
        pulauPriceMap.put("Sulawesi - Rp 85.000", 85000);
        pulauPriceMap.put("Papua - Rp 100.000", 100000);
        return pulauPriceMap;
    }
    private void calculateTotalHarga() {
        
        int pulauPrice = pulauPriceMap.getOrDefault(selectedPulau, 0);
        int seriPrice = seriPriceMap.getOrDefault(selectedSeri, 0);
        int totalHarga = seriPrice + pulauPrice + 150000;

        totalHargaLabel2.setText("Total Harga: Rp " + totalHarga);
    }
    private void displaySelectedOptions() { 	
        sizeLabel2.setText(selectedSize + " - Rp 150.000");
        warnaLabel2.setText(selectedWarna);
        eksLabel2.setText(selectedEks);
        pulauLabel2.setText(selectedPulau);
        seriLabel2.setText(selectedSeri);
        
    }
    public void switchToScene1(ActionEvent event) throws IOException {
		Parent root = FXMLLoader.load(getClass().getResource("Scene1.fxml"));
		stage = (Stage)((Node)event.getSource()).getScene().getWindow();
		scene = new Scene(root);
		stage.setScene(scene);
		stage.show();
	}
    public void switchToScene4(ActionEvent event) throws IOException {
		Parent root = FXMLLoader.load(getClass().getResource("Scene4.fxml"));
		stage = (Stage)((Node)event.getSource()).getScene().getWindow();
		scene = new Scene(root);
		stage.setScene(scene);
		stage.show();
	}
    
}
